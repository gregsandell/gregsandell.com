import java.util.*;
import java.io.*;
import java.lang.Math.*;
import java.lang.Integer.*;
import java.awt.*;
import java.awt.event.*;
import java.awt.image.*;

public class plotCanvas extends Canvas {
	public Rectangle GRect, GbRect;
	public double minyval_box, maxyval_box, minxval_box, maxxval_box;
	public double minyval_canvas, maxyval_canvas, minxval_canvas, maxxval_canvas;
	public double[] xmappings, ymappings;
	public int lM, rM, tM, bM; 
	public int innerright; 
	public int innerbot; 
	public Color foreground_color, background_color;
	public AxisGraphic leftAxisGraphic, rightAxisGraphic, topAxisGraphic;
	public AxisGraphic botAxisGraphic;
	public ticlocs yticlocs, xticlocs;
	public boolean visible;
	public plotCanvas() {
		super();
		visible = true;
	}
	public void setColors(Color fore, Color back) {
		foreground_color = fore;	
		background_color = back;
		setBackground(background_color);
		setForeground(foreground_color);
	}

	public void setboxdataspace(double minx, double maxx, 
		double miny, double maxy) {
		xticlocs = new ticlocs(minx,maxx,5);
		minxval_box = xticlocs.min;
		maxxval_box = xticlocs.max;
		yticlocs = new ticlocs(miny,maxy,5);
		minyval_box = yticlocs.min;
		maxyval_box = yticlocs.max;
		minxval_box = minxval_box - (.05 * (maxxval_box-minxval_box));
		maxxval_box = maxxval_box + (.05 * (maxxval_box-minxval_box));
		minyval_box = minyval_box - (.05 * (maxyval_box-minyval_box));
		maxyval_box = maxyval_box + (.05 * (maxyval_box-minyval_box));
		double ran = maxxval_box - minxval_box;
		minxval_canvas = minxval_box - 
			(((double)lM/(double)GbRect.width) * ran);
		maxxval_canvas = maxxval_box + 
			(((double)rM/(double)GbRect.width) * ran);
		ran = maxyval_box - minyval_box;
		minyval_canvas = minyval_box - 
			(((double)bM/(double)GbRect.height) * ran);
		maxyval_canvas = maxyval_box + 
			(((double)tM/(double)GbRect.height) * ran);
	}
	public void boundingbox(Graphics g) {
		int x2 = innerright;
		int y2 = innerbot;
		int x = GbRect.x;
		int y = GbRect.y;
		g.drawLine(x,y,x2,y);
		g.drawLine(x2,y,x2,y2);
		g.drawLine(x2,y2,x,y2);
		g.drawLine(x,y2,x,y);
	}
	public void setbox(int ilM, int irM, int itM, int ibM)  {
// this sets things that convertx() and converty() will need to know
		lM = ilM; rM = irM; tM = itM; bM = ibM;
		GRect = this.getBounds();
		GbRect = new Rectangle(lM,tM,GRect.width-(lM+rM), GRect.height-(tM+bM));
		innerright = GbRect.width + lM;
		innerbot = GbRect.height + tM;
	}
	public double unconvertx(int val)  {
		if (xmappings == null) {
				xmappings = new double[GRect.width];
				for (int i=0; i < GRect.width; i++)  {
					xmappings[i] = minxval_canvas +
						(((double)i/(double)GRect.width) * 
						(maxxval_canvas - minxval_canvas));
				}
		}
		return xmappings[val];
	}
	public double unconverty(int val)  {
		if (ymappings == null) {
				ymappings = new double[GRect.height];
				double ran = maxyval_canvas - minyval_canvas;
				for (int i=0; i < GRect.height; i++) {
					double r =minyval_canvas +
						(((double)i/(double)GRect.height) * ran);
					ymappings[i] = (minyval_canvas - r) + maxyval_canvas;
				}
		}
		return ymappings[val];
	}
	public int convertx(double val) 
	{
		int r;
		r = lM + (int)(((val-minxval_box)/(maxxval_box-minxval_box))*(double)(innerright-lM));
    if (r < lM)
        System.out.println("convertx(" + val + ") = " + r + " is < "  +
			lM + "!");
    if (r > innerright)
        System.out.println("convertx(" + val + ") = " + r + " is > "  +
			innerright + "!");
		return(r);
	}
	
	public int converty(double val) 
	{
		int r;
		r = tM + (int)(((val-minyval_box)/(maxyval_box-minyval_box))*(double)(innerbot-tM));
		r = (tM - r) + innerbot;
    if (r < tM)
        System.out.println("converty(" + val + ") = " + r + " is < "  +
			tM + "!");
    if (r > innerbot)
        System.out.println("converty(" + val + ") = " + r + " is > "  +
			innerbot + "!");
		return(r);
	}
	public void makeAxisGraphic(String ax, String si, String lString, ticlocs theselocs, String ddir) {
		if (ax.equals("x")) {
			if (si.equals("bot")) {
// System.out.println("making bot axis graphic");
				botAxisGraphic = new AxisGraphic(theselocs,lString,ax,si,ddir);
			}
			if (si.equals("top")) {
				topAxisGraphic = new AxisGraphic(theselocs,lString,ax,si,ddir);
			}
		}
		if (ax.equals("y")) {
			if (si.equals("left")) {
				leftAxisGraphic = new AxisGraphic(theselocs,lString,ax,si,ddir);
			}
			if (si.equals("right")) {
				rightAxisGraphic = new AxisGraphic(theselocs,lString,ax,si,ddir);
			}
		}
	}
	class AxisGraphic {
		public Image image, label;
		public int valuesheight, labelheight;
		String axis, side, dir;
		public final int off = 5;
		public final double prop = .025;
		public int imageypos, imagexpos, labelypos, labelxpos;
		public ticlocs theselocs;
		public AxisGraphic(ticlocs tlocs, String lString, String ax, String si, String ddir)  {
			Image tempim1, tempim2;
			Toolkit mytk;
			Font labfont, valsfont;
			Graphics bg;
			FontMetrics valsfm, labfm;
			int sw, w, x;
			String sval;
	
			theselocs = tlocs;
			axis = ax; side = si;   // is this wise??
			w = axis.equals("y") ? GRect.height : GRect.width;
			dir = ddir;
			valuesheight = 0;
//			mytk = getToolkit();
			if (theselocs != null) {
				valsfont = new Font("TimesRoman",Font.PLAIN,10);
				setFont(valsfont);
				valsfm = Toolkit.getDefaultToolkit().getFontMetrics(valsfont);
				valuesheight = valsfm.getHeight();
// System.out.println("w = " + w + " vh = " + valuesheight);
				tempim1 = createImage(w, valuesheight); // not a mistake!
				label = createImage(w, valuesheight); // not a mistake!
				bg = tempim1.getGraphics();
				for (int i=0; i < theselocs.numlocs; i++) {
					double dval;
					dval = theselocs.locs[i];
					sval = new Integer((int)Math.floor(dval)).toString();
					x = 0; // to satisfy compiler
					if (axis.equals("y")) {
	//				The "w -" is because y axis numbering is from top to bottom
						x = w - converty(dval); // not a typo!
					}
					if (axis.equals("x"))
						x = convertx(dval);
					sw = valsfm.stringWidth(sval);
					int xw2 = x-(sw/2);  // center the string
					bg.drawString(sval,xw2,valuesheight);
				}
				if (axis.equals("y")) {
					imageypos = 0;
					if (side.equals("left")) 
						imagexpos = lM-(valuesheight+off);
					if (side.equals("right"))
						imagexpos = innerright + off;
				}
				if (axis.equals("x")) {
					imagexpos = 0;
					if (side.equals("top")) 
						imageypos = tM-(valuesheight+off);
					if (side.equals("bot"))
						imageypos = innerbot + off;
				}
				bg.dispose();
				if (axis.equals("y")) 
						image = rotImage90(tempim1);
					else 
						image = tempim1;
			}
			if (lString != null) {
				w = axis.equals("y") ? GRect.height : GRect.width;
				int cw = axis.equals("y") ? GbRect.height : GbRect.width;
				labfont = new Font("TimesRoman",Font.BOLD,12);
				setFont(labfont);
				labfm = Toolkit.getDefaultToolkit().getFontMetrics(labfont);
				labelheight = labfm.getHeight();
				tempim2 = createImage(w, labelheight); // not a mistake!
				sw = labfm.stringWidth(lString);
				int xw2 = ((cw/2) - (sw/2)) + (axis.equals("y") ? bM : lM);
				bg = tempim2.getGraphics();
				bg.drawString(lString,xw2,labelheight);
				if (axis.equals("y")) {
					labelypos = 0;
					if (side.equals("left")) 
						labelxpos = lM-(valuesheight+labelheight+off*2);
					if (side.equals("right"))
						labelxpos = innerright + off + valuesheight;
				}
				if (axis.equals("x")) {
					labelxpos = 0;
					if (side.equals("top")) 
						labelypos = tM-(valuesheight+labelheight+off);
					if (side.equals("bot"))
						labelypos = innerbot+valuesheight+off;
				}
				bg.dispose();
				if (axis.equals("y")) 
						label = rotImage90(tempim2);
					else 
						label = tempim2;
			}
		}
		public void draw(Graphics g) {
			g.drawImage(image,imagexpos,imageypos,null);
			g.drawImage(label,labelxpos,labelypos,null);
			drawAxisTics (g, axis, side, dir);
		}
		public void drawAxisTics (Graphics g, String ax, String si, String
	dir) {
			int startx, starty, endx, endy;
			int Xextent, Yextent;
			if (theselocs == null) return;
			Xextent = (int)((double)GRect.width * prop);
			Yextent = (int)((double)GRect.height * prop);
			if (ax.equals("x")) {
				starty = si.equals("bot") ? innerbot : tM;
				endy = starty + (dir.equals("out") ? Xextent : -Xextent);
				for (int i=0; i < theselocs.numlocs; i++) {
					int x=convertx(theselocs.locs[i]);
					g.drawLine(x,starty,x,endy);
				}
			}
			if (ax.equals("y")) {
				startx = si.equals("left") ? lM : innerright;
				endx = startx + (dir.equals("out") ? -Xextent : Xextent);
				for (int i=0; i < theselocs.numlocs; i++) {
					int y=converty(theselocs.locs[i]);
					g.drawLine(startx,y,endx,y);
//System.out.println("val " + theselocs.locs[i] + " being drawn at pos " + y);
				}
			}
		}
		public Image rotImage90(Image i) {
			Image l = null;
			try {
				int width        = i.getWidth(null);
				int height       = i.getHeight(null);
				int pixels[]     = new int [width * height];
				PixelGrabber pg  = new PixelGrabber (i, 0, 0, width, height, pixels,
				0, width);
		//		if (pg == null) System.out.println("null pg");
				boolean grabbed = pg.grabPixels();
		//		if (!grabbed) System.out.println("grabPixels failed");
				boolean pgbits = (pg.getStatus() & ImageObserver.FRAMEBITS) != 0;
		//		if (!pgbits) System.out.println("pgbits mask failed");
				if (grabbed && pgbits) {
					int[] newp;
					newp = rot90Pixels (pixels, width, height);
					if (newp == null) System.out.println("null newp");
					MemoryImageSource mis = new MemoryImageSource (height, width, newp,
					0, height);
					if (mis == null) System.out.println("null mis");
					l = createImage (mis);
				}
			} 
				catch (InterruptedException e) {
					e.printStackTrace();
				}
		//	if (l == null) {
		//		System.out.println("failure in rotImage90()");
		//		l = createImage(0,0);
		//	}
			return l;
		}
		private int[] rot90Pixels (int pixels[], int width, int height) {
			int newPixels[] = null;
			if ((width*height) == pixels.length) {
				newPixels = new int [width*height];
				int newIndex=0;
				for (int x=width-1;x>=0;x--)
					for (int y=0;y<height;y++)
						newPixels[newIndex++]=pixels[y*width+x];
			}
			return newPixels;
		}
	}
	class ticlocs {  // original code in C by Paul Heckbert
		double[] locs; // from "Graphics Gems", Academic Press, 1990
		double min, max;
		int numlocs;
//	ticlocs causes a plotting area to be larger than originally specified.
//	It is annoying when it gets too large.  "tol" defines the maximum by
//	which the space should be allowed to enlarge.  It is a fraction of
//	area originally defined.
		final double tol = .25; 
		public ticlocs(double lmin, double lmax, int NTICK) {
		    int i, nfrac;
		    double d;                           /* tick mark spacing */
		    double graphmin, graphmax;          /* graph range lmin and lmax */
		    double range, x;
				double[] newlocs;
		
		    /* we expect lmin!=lmax */
		    range = nicenum(lmax-lmin, false);
		    d = nicenum(range/(NTICK-1), true);
		    graphmin = Math.floor(lmin/d)*d;
		    graphmax = Math.ceil(lmax/d)*d;
		    nfrac = (int)Math.max(-Math.floor(log10(d)), 0d);   /* # of fractional digits to show */
		
		    for (x=graphmin, i = 0; x<graphmax+.5d*d; x+=d, i++) { }
			locs = new double[i];
		    for (x=graphmin, i = 0; x<graphmax+.5d*d; x+=d, i++)
					locs[i] = x;
			numlocs = i;
			double dran = (lmax - lmin) * tol;
// System.out.println("numlocs = " + numlocs + " lmin = " + lmin + " lmax = " +lmax);
			min = locs[0]; max = locs[numlocs-1];
//		The tics create too much empty space on the low-number ends
			boolean bad1 = Math.abs(locs[0]-lmin) > dran;
//		The tics have gone down to a negative value, whereas the input
//		data does not contain negatives
			boolean bad2 =  (lmin >= 0d) && (locs[0]<0d);
			if (bad2) System.out.println("undesirable negative values");
			if (bad1 || bad2) {
				newlocs = new double[numlocs-1];
				for (i = 1; i < numlocs; i++) {
					newlocs[i-1] = locs[i];
				}
				locs = newlocs;
				--numlocs;
				min = lmin;
			}
//		The tics create too much empty space on the high-number ends
			bad1 = Math.abs(locs[numlocs-1]-lmax) > dran;
			if (bad1) {
				newlocs = new double[numlocs-1];
				for (i = 0; i < numlocs-1; i++)
					newlocs[i] = locs[i];
				locs = newlocs;
				max = lmax;
				--numlocs;
			}
		}
		public double log10(double Num) { return Math.log(Num)/Math.log(10); }
	
	/*
	 * nicenum: find a "nice" number approximately equal to x.
	 * Round the number if round=true, take ceiling if round=false
	 */
		public double nicenum(double x, boolean round) {
		    int expv;                           /* exponent of x */
		    double f;                           /* fractional part of x */
		    double nf;                          /* nice, rounded fraction */
		
		    expv = (int)Math.floor(log10(x)); // I sure hope that's a log10()!
		    f = x/Math.pow(10., expv);              /* between 1 and 10 */
		    if (round)
		        if (f<1.5d) nf = 1d;
		        else if (f<3d) nf = 2d;
		        else if (f<7d) nf = 5d;
		        else nf = 10d;
		    else
		        if (f<=1d) nf = 1d;
		        else if (f<=2d) nf = 2d;
		        else if (f<=5d) nf = 5d;
		        else nf = 10d;
		    return nf*Math.pow(10d, expv);
		}
	/* if roundoff errors in pow cause problems, use this: */
	
		public double alternate_pow(double a, int n) {
	    double x;
	
	    x = 1d;
	    if (n>0) for (; n>0; n--) 
					x *= a;
				else 
					for (; n<0; n++) 
						x /= a;
	    return x;
		}
	
	}
}
