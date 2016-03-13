import java.util.*;
import java.io.*;
import java.lang.Math.*;
import java.lang.Integer.*;
import java.applet.*;
import java.awt.*;
import java.awt.event.*;
import java.awt.image.*;
import sun.audio.*;

public class stest extends Applet {
	public SpectrumCanvas gcSpect;
	public WaveformCanvas gcWave;
	public PhaseCanvas gcPhase;
	public sharctimbre s;
	public int awidth, aheight;
	public FlowLayout stestLayout;
	PlotCanvasControls	canvasControls;
	Panel p;
	Label l;
	final int panelSize = 200;
	public void init() {
	System.out.println("The JVM on this machine is " + 
		System.getProperty("java.version"));

		awidth = Integer.parseInt(getParameter("width"));
		aheight = Integer.parseInt(getParameter("height"));
//		this.enableEvents(AWTEvent.KEY_EVENT_MASK);
//		this.requestFocus();
//		stestLayout = new FlowLayout();	
		setLayout(null);
		s = new sharctimbre();
//  oy vey, this is silly
		canvasControls = new PlotCanvasControls(awidth, aheight, panelSize, this);
//	The ordering below is important.  Each constructor must be followed
//	by it's canvasControls setting.  
		gcWave = new WaveformCanvas(s,canvasControls);
		canvasControls.gcWave = gcWave;
		gcSpect = new SpectrumCanvas(s,canvasControls);
		canvasControls.gcSpect = gcSpect;
		gcPhase = new PhaseCanvas(s,canvasControls);
		canvasControls.gcPhase = gcPhase;
		gcSpect.gcWave = gcWave;
		gcSpect.gcPhase = gcPhase;
		gcPhase.gcWave = gcWave;
		p = new Panel();
		p.setLayout(new FlowLayout());
		Button b = new Button("Clear");
		b.addActionListener(
			new ActionListener() {
				public void actionPerformed(ActionEvent e) {
					gcSpect.reinit();
				}
			}
		);
		Button b2 = new Button("Turn audio on ");
		class AudioButtonListener implements ActionListener {
			Button bb;
			sharctimbre sss;
			public AudioButtonListener (Button b, sharctimbre ss) {
				bb = b;
				sss = ss;
			}
			public void actionPerformed(ActionEvent e) {
				if (bb.getLabel().equals("Turn audio on ")) {
					if (sss.wave != null)
						sss.wave.loop();
					gcWave.soundon = true;
					bb.setLabel("Turn audio off");
				}
					else {
						if (sss.wave != null)
							sss.wave.stop();
						gcWave.soundon = false;
						bb.setLabel("Turn audio on ");
					}
			}
		}
		b2.addActionListener(new AudioButtonListener(b2,s));
		Button b3 = new Button("Show Waveform");
		class WaveShowListener implements ActionListener {
			Button bb;
			public WaveShowListener (Button b) {
				bb = b;
			}
			public void actionPerformed(ActionEvent e) {
				if (bb.getLabel().equals("Show Waveform")) {
//					gcWave.setVisible(true);
					gcWave.makeVisible = true;
					bb.setLabel("Hide Waveform");
				}
					else {
						gcWave.makeVisible = false;
						bb.setLabel("Show Waveform");
					}
				canvasControls.resize();
				canvasControls.update();
			}
		}
		b3.addActionListener(new WaveShowListener(b3));
		Button b4 = new Button("Show Phases");
		class PhaseShowListener implements ActionListener {
			Button bb;
			public PhaseShowListener (Button b) {
				bb = b;
			}
			public void actionPerformed(ActionEvent e) {
				if (bb.getLabel().equals("Show Phases")) {
					gcPhase.makeVisible = true;
					bb.setLabel("Hide Phases");
				}
					else {
//						gcPhase.setVisible(false);
						gcPhase.makeVisible = false;
						bb.setLabel("Show Phases");
					}
				canvasControls.resize();
				canvasControls.update();
			}
		}
		b4.addActionListener(new PhaseShowListener(b4));
		Button b5 = new Button("Randomize Phase");
		b5.addActionListener(
			new ActionListener() {
				public void actionPerformed(ActionEvent e) {
					s.scramblephases();
					s.makesamps();
					s.harms2segments(gcPhase);
					s.samps2segments(gcWave);
					gcWave.repaint();
					gcPhase.repaint();
				}
			}
		);
		Button b6 = new Button("Randomize Magnitude");
		b6.addActionListener(
			new ActionListener() {
				public void actionPerformed(ActionEvent e) {
					s.scrambleamps(gcSpect);
					s.makesamps();
//					s.harms2segments(gcPhase);
					s.harms2segments(gcSpect);
					s.samps2segments(gcWave);
					gcWave.repaint();
					gcSpect.repaint();
				}
			}
		);
		l = new Label("Fundamental(Hz):",Label.RIGHT);
		p.add(l);
		p.add(gcSpect.fundamentaltext);
		l = new Label("Harmonic(#):",Label.RIGHT);
		p.add(l);
		p.add(gcSpect.harmtext);
		l = new Label("Level(dB):",Label.RIGHT);
		p.add(l);
		p.add(gcSpect.dbtext);
		l = new Label("Frequency(Hz):",Label.RIGHT);
		p.add(l);
		p.add(gcSpect.frequencytext);
		l = new Label("Phase(degrees):",Label.RIGHT);
		p.add(l);
		p.add(gcSpect.phasetext);
		p.add(b); 
		p.add(b2); 
		p.add(b3); 
		p.add(b4); 
		p.add(b5); 
		p.add(b6); 
		add(gcWave); add(gcSpect); add(gcPhase);
		add(p);
//		p.setSize(200,panelSize);
		p.setBounds(0,aheight-panelSize,awidth,panelSize);
		gcWave.makeVisible = false;
		gcSpect.makeVisible = true;
		gcPhase.makeVisible = false;
		gcSpect.mycursor = new CursorState(gcSpect);
		gcPhase.mycursor = new CursorState(gcPhase);
		canvasControls.resize();
		canvasControls.update();
		p.doLayout();
		Dimension d = p.getSize();
	}
	public void start() {
/*		gcWave.setVisible(false);
		gcSpect.setVisible(true);
		gcSpect.mycursor = new CursorState(gcSpect);
		canvasControls.resize(); */
	}
	public void processKeyEvent(KeyEvent e) {
		if (e.getID() == KeyEvent.KEY_TYPED) {
				System.out.println("got a key event in main");
				if (e.getKeyCode() == KeyEvent.VK_CONTROL)
					System.out.println("...and it was the ctrl key");
		}
			else
				super.processKeyEvent(e);
	}
}
	class PlotCanvasControls {
		WaveformCanvas gcWave;
		SpectrumCanvas gcSpect;
		PhaseCanvas gcPhase;
		stest sstest;
		int awidth, aheight, panelSize;
		public PlotCanvasControls(int aw, int ah, int ps, stest st) {
			awidth = aw;
			aheight = ah;
			sstest = st;
System.out.println("at construct, awidth = " + awidth + " aheight = " +
aheight);
			panelSize = ps;
		}
		public int numVisible() {
			int j = 0;
			if (gcWave.makeVisible == true) ++j;
			if (gcSpect.makeVisible == true) ++j;
			if (gcPhase.makeVisible == true) ++j;
			return j;
		}
		public void resize(WaveformCanvas gc1) {
			gcWave.setVisible(false);
			int width = (awidth/numVisible()) - 10;
			int height = aheight-panelSize-5;
			gcWave.create(40,20,10,50,width,height);
			gcWave.setBounds(0,0,width,height);
		}
		public void resize(SpectrumCanvas gc2) {
			gcSpect.setVisible(false);
			int width = (awidth/numVisible()) - 10;
			int height = aheight-panelSize-5;
			int off = gcWave.makeVisible ? width : 0;
			gcSpect.create(40,20,10,50,width,height);
			gcSpect.setBounds(off,0,width,height);
		}
		public void resize(PhaseCanvas gc1) {
			gcPhase.setVisible(false);
			int width = (awidth/numVisible()) - 10;
			int height = aheight-panelSize-5;
			gcPhase.create(40,20,10,50,width,height);
			int off = gcWave.makeVisible ? width : 0;
			off += gcSpect.makeVisible ? width : 0;
			gcPhase.setBounds(off,0,width,height);
		}
		public void resize() {
			resize(gcWave);
			resize(gcSpect);
			resize(gcPhase);
		}
		public void update() {
			if (gcWave.makeVisible == true) {
				gcWave.setVisible(true);
				gcWave.repaint();
			}
			if (gcSpect.makeVisible == true) {
				gcSpect.setVisible(true);
				gcSpect.repaint();
			}
			if (gcPhase.makeVisible == true) {
				gcPhase.setVisible(true);
				gcPhase.repaint();
			}
//			sstest.doLayout();
		}
	}
	
			
class sharctimbre {
	public harmonic[] sharcdata;
	public int nharms, maxharms;
	public double fund;
	public samples samps;
	public BitSet boolharms;
	public boolean nofundamental;
	public PoskanzerAudioClip wave;
// harmindexes[] needed because user does not necessary enter harmonics
// in order 1,2,3...he could do 1,5,2,6 etc.  
// To find what value i in sharctimbre[i] to find the 4th harmonic of
//	the complex, check harmindexes[4] (note, ordered 1 to n, not 1 to
//	n-1!)
	public int[] harmindexes;
	public sharctimbre() {
		maxharms = 200;
		sharcdata = new harmonic[maxharms];
		boolharms = new BitSet(maxharms);
		harmindexes = new int[maxharms];
		samps = new samples();
		init();
	}
	public void init() {
		nofundamental = true;
		nharms = 0;
		fund = 0d;
		for (int i=0; i < maxharms; i++) {
			boolharms.clear(i+1);
		}
		samps.init();
	}
	class samples {
		public double[] x;
		public byte[] b;
		public int numsamps;
		public double srate, timeincr, minamp, maxamp;
		public samples() {
			init();
		}
		public void init() {
			x = null;
			numsamps = 100;  // so gcWave will have some coordinates to use
			minamp = -100d;  // the first time around...they're fake
			maxamp = 100d;
			timeincr = 0d;
		}
	}
	public double getfund() {
		return fund;
	}
	public void printallharms() {
		for (int i = 0; i < nharms; i++) {
			 this.sharcdata[i].print();
		}
	}
	public void harms2segments(SpectrumCanvas gc) {
		if ((gc.harmsegments.length) != nharms) {
				gc.harmsegments = new pointpairs[nharms];
				for (int i=0; i < nharms; i++)
					gc.harmsegments[i] = harm2newsegment(gc,sharcdata[i]);
		}
			else {
				for (int i=0; i < nharms; i++) 
					harm2segment(gc,i,sharcdata[i]);
			}
	}
	public pointpairs harm2newsegment(SpectrumCanvas gc, harmonic h) {
		int val;
		if ((gc.toString()).startsWith("SpectrumCanvas") == true) 
				val = gc.converty(h.getdb());
			else
				val = gc.converty(h.getphase());
		return new pointpairs(
			gc.convertx(h.getfreq()), val,
			gc.convertx(h.getfreq()), gc.converty(gc.minyval_box));
	}
	public void harm2segment(SpectrumCanvas gc, int i, harmonic h) {
		gc.harmsegments[i].p1.x = gc.convertx(h.getfreq());
		gc.harmsegments[i].p2.x = gc.convertx(h.getfreq());
		gc.harmsegments[i].p2.y = gc.converty(gc.minyval_box);
//  ouch!  is this going to slow things down?
		if ((gc.toString()).startsWith("SpectrumCanvas") == true) {
				gc.harmsegments[i].p1.y = gc.converty(h.getdb());
		}
			else {
				gc.harmsegments[i].p1.y = gc.converty(h.getphase());
			}
	}
		
	public void samps2segments(WaveformCanvas gc) {
// System.out.println("in samps2segments");
		if (samps.x == null) return;
//		Make assumption (!) that if x is set, so is y...
		boolean newone;
		newone = gc.sampsegmentsx == null || 
			gc.sampsegmentsx.length != samps.numsamps;
		if (newone) {
			gc.sampsegmentsx = new int[samps.numsamps];
			gc.sampsegmentsy = new int[samps.numsamps];
			gc.lastsampsegmentsx = new int[samps.numsamps];
			gc.lastsampsegmentsy = new int[samps.numsamps];
			gc.lastnumsamps = samps.numsamps;
		}
		for (int i=0; i < samps.numsamps; i++) {
			gc.sampsegmentsx[i] = gc.convertx((double)i);
			gc.sampsegmentsy[i] = gc.converty(samps.x[i]);
//		redraw() always needs to find something in lastsampsegments
//		arrays.  The first time through, it will superfluously
//		draw over what it is about to draw
			if (newone) {
				gc.lastsampsegmentsx[i] = gc.sampsegmentsx[i];
				gc.lastsampsegmentsy[i] = gc.sampsegmentsy[i];
			}
		}
	}
	public void makesamps() {
		if (nharms > 0)
//			Note!  127.0 is the right choice for 8-bit samples
			oneperiod(8000d,127.0);
//		for (int i=0; i < getonepersamps(8000d,fund); i++)
//			System.out.println(samps.x[i]);
	}
		
	public int getonepersamps(double srate,double fund)
	{
		return((int)((srate/fund)+0.5));
	}
	public double fmod(double var, double base) {
		return(var - (base * (double)((int)(var/base))));
	}
	public void scramblephases() {
		Random myRandObj = new Random();
		for (int i=0; i < nharms; i++) 
			sharcdata[i].setphase((myRandObj.nextDouble() * 360d) - 180d);
	}
	public void scrambleamps(SpectrumCanvas gc) {
		Random myRandObj = new Random();
		for (int i=0; i < nharms; i++) 
			sharcdata[i].setdb(myRandObj.nextDouble() * gc.minyval_box);
	}

	public void oneperiod(double srate, double maxamp) {
		double fact, max, pi, twopi, startfund, dbhs, tpss, tpssh, sbhs, psfi;
		double jj, fi, nyquist, amp, phase, freq;
		int onepersamps, maxharm, minharm, i, j;
	
		samps.srate = srate;
		samps.timeincr = 1d/srate;
//		pi = 4d * Math.atan(1d);
		pi = Math.PI;
		twopi = 2d * pi;
		startfund = fund;
		minharm = 1; maxharm = nharms;
		nyquist = srate/2d;
	    onepersamps = getonepersamps(srate,startfund);
		samps.numsamps = onepersamps;
		if (samps.x == null || samps.x.length != onepersamps) {
			samps.x = new double[onepersamps];
			samps.b = new byte[onepersamps];
		}
		tpss = (twopi*startfund)/srate;
		for (i = 0, max = -40000d; i < onepersamps; i++) {
			fi = (double)i;
			samps.x[i] = 0d;
			j = 0; jj = 1d;
			while 
				(
					(j < maxharm) &&
					((startfund * jj) < nyquist )
				) {
				if ((j+1) < minharm) { ++j; jj += 1.0; continue; }
				freq = sharcdata[j].getfreq();
				amp = sharcdata[j].getlinamp();
				phase = (sharcdata[j].getphase()/360d) * pi;
				tpssh = (twopi * freq)/srate;
				samps.x[i] += amp * Math.sin(fmod((fi * tpssh) + phase,twopi));
//				samps.x[i] += amp * Math.sin(Math.IEEEremainder((fi * tpssh) + phase,twopi));
				++j; jj += 1.0;
			}
			if (Math.abs(samps.x[i]) > max) {
				max = Math.abs(samps.x[i]);
	/*			fprintf(stderr,"new max %f\n", max); */
			}
		}
int ii = 0;
		fact = (maxamp/max);
		samps.minamp = -(fact * max);
		samps.maxamp = fact * max;
/*		fact = (maxamp/max) * 
			(doloudadjust ? loudadjust(nharms,amps,freqs) : 1.0); */
		for (i = 0; i < onepersamps; i++) {
//			samps.b[i] = (byte)samps.x[i];
			samps.b[i] = wave.toUlaw((int)(samps.x[i] * 16384d));
			samps.x[i] *= fact; 
		}
	/*	fp = fopen("/tmp/oneper.samps","w");
		for (i = 0; i < onepersamps; i++)
			fprintf(fp,"%f\n",samps.x[i]);
		fclose(fp); */
	}
}
class harmonic {
	private int harmnum;
	private double freq, db, phase, linamp;
	private int x, y;
	public harmonic(double f, double d, double p) {
		freq = f; db = d; linamp = Math.pow(10d,db/20d); phase = p;
	}
	public harmonic(double fu, int h, double d, double p) {
		this(fu * (double)h,d,p); 
	} 
	public harmonic(double f, double d) {
		this(f,d,0d);
	} 
	public harmonic(double fu, int h, double d) {
		this(fu,h,d,0d);
	} 
	public harmonic() {
		freq = 0d; db = 0d; phase = 0d; linamp = 1d;
	}
	public harmonic(harmonic h) {
		freq = h.getfreq(); db = h.getdb();
		linamp = h.getlinamp(); phase = h.getphase();
	}
	public void set(double f, double d, double p, int h) {
		freq = f; db = d; linamp = Math.pow(10d,db/20d); phase = p;
		harmnum = h;
	}
	public void print() {
		System.out.println("harmonic freq = " + freq + " db = " +
			db + " phase = " + phase + " harmnum = " + harmnum);
	}
	public void setfreq(double f) { freq = f; }
	public void setphase(double p) { phase = p; }
	public void setharmnum(int i) { harmnum = i; }
	public void setdb(double d) {
		db = d; linamp = Math.pow(10d,db/20d); 
	}
	public double getphase() { return phase; }
	public double getfreq() { return freq; }
	public double getdb() { return db; }
	public double getlinamp() { return linamp; }
	public int getharmnum() { return harmnum; }
	public void copy(harmonic h) {
		freq = h.getfreq(); db = h.getdb();
		linamp = h.getlinamp(); phase = h.getphase();
	}
}
		
class pointpairs {
	public Point p1, p2;
	public pointpairs(int x1, int y1, int x2, int y2) {
		p1 = new Point(x1,y1);
		p2 = new Point(x2,y2);
	}
	public void set(int x1, int y1, int x2, int y2) {
		p1.x = x1; p1.y = y1; p2.x = x2; p2.y = y2; }
	public void print() {
		System.out.println("pointpair " + p1.x + " " + p1.y + " " +
			p2.x + " " + p2.y);
	}
	public void copy(pointpairs pp) {
		this.p1 = new Point(pp.p1.x,pp.p1.y);
		this.p2 = new Point(pp.p2.x,pp.p2.y);
	}
}
class myPlotCanvas extends plotCanvas {
	public myPlotCanvas() {
		super();
	}
    public sharctimbre ss;
    public void drawsegment(Graphics g, pointpairs pp) {
        g.drawLine(pp.p1.x,pp.p1.y, pp.p2.x,pp.p2.y);
    }
}
class WaveformCanvas extends myPlotCanvas {
//	public Point[] sampsegments;
	public int[] sampsegmentsx, sampsegmentsy;
	public int[] lastsampsegmentsx, lastsampsegmentsy;
	public int lastnumsamps;
//	public Image buffered_image;
	public boolean soundon, makeVisible;
	public sharctimbre ss;
	public PlotCanvasControls controls;
	public WaveformCanvas(sharctimbre s, PlotCanvasControls c) {
		super();
		setColors(Color.black,Color.gray);
		ss = s;
		controls = c;
		soundon = false; // soundon here because this object gets
										// initialized only once
	}
	public void recreate() {
		setboxdataspace(0d,(double)ss.samps.numsamps,
			ss.samps.minamp, ss.samps.maxamp);
		makeAxisGraphic("y","left","Amplitude",yticlocs,"in");
		makeAxisGraphic("x","bot","Sample",xticlocs,"in");
	}
	public void create(int llM, int lrM, int ltM, int lbM, int w, int h) {
		setSize(w,h);
		setbox(llM, lrM, ltM, lbM);
		recreate();
		ss.samps2segments(this);
	}
	public void redraw_wave(Graphics g) {
		if (ss.samps.x != null)  {
			g.setColor(background_color);
			g.drawPolyline(lastsampsegmentsx,lastsampsegmentsy,
				lastnumsamps);
			g.setColor(foreground_color);
			g.drawPolyline(sampsegmentsx,sampsegmentsy,
				ss.samps.numsamps); 
			lastnumsamps = ss.samps.numsamps; 
			for (int i=0; i < lastnumsamps; i++) {
				lastsampsegmentsx[i] = sampsegmentsx[i];
				lastsampsegmentsy[i] = sampsegmentsy[i];
			}
		}
	}
	public void paint(Graphics g) { 
		if (isVisible() == false) return;
		boundingbox(g);
//		if (ss.samps.x == null) return;
//		if (ss.samps.numsamps > 0)  {  no longer appropriate test
		redraw_wave(g);
		if (leftAxisGraphic != null) {
			leftAxisGraphic.draw(g);
		}
		if (rightAxisGraphic != null)
			rightAxisGraphic.draw(g);
		if (topAxisGraphic != null)
			topAxisGraphic.draw(g);
		if (botAxisGraphic != null)
			botAxisGraphic.draw(g);
	}
}
class CursorState {
	public Cursor cross, moveharm, def, currentcursor; 
	public int crosstype, deftype, moveharmtype;
	public Component parentcomp;
	public CursorState(SpectrumCanvas gc) {

//		crosstype = Frame.CROSSHAIR_CURSOR;
		crosstype = Frame.DEFAULT_CURSOR;
		deftype = Frame.DEFAULT_CURSOR;
		moveharmtype = Frame.N_RESIZE_CURSOR;
		cross = new Cursor(crosstype);
		def = new Cursor(deftype);
		moveharm = new Cursor(moveharmtype);
		parentcomp = (Component)gc.getParent();
		currentcursor = new Cursor(deftype);
	}
	public void setcross() {
			if (currentcursor.getType() == crosstype) return;
   			parentcomp.setCursor(cross);
			currentcursor = cross;
	}
	public void setdef() {
			if (currentcursor.getType() == deftype) return;
   			parentcomp.setCursor(def);
			currentcursor = def;
	}
	public void setmoveharm() {
			if (currentcursor.getType() == moveharmtype) return;
   			parentcomp.setCursor(moveharm);
			currentcursor = moveharm;
	}
}
		
class PhaseCanvas extends SpectrumCanvas {
	public PhaseCanvas(sharctimbre s, PlotCanvasControls c) {
		super(s,c);
	}
	public void create(int llM, int lrM, int ltM, int lbM, int w, int h) {
		setSize(w,h);
		setbox(llM, lrM, ltM, lbM);
// System.out.println("GRect = " + rectPrint(GRect) + " GbRect = " +
// rectPrint(GbRect));
		setboxdataspace(0d,1000d,-180d,180d);
		makeAxisGraphic("y","left","Phase (degrees)",yticlocs,"in");
		makeAxisGraphic("x","bot","Frequency (Hz)",xticlocs,"out");
		ss.harms2segments(this);
		xmappings = null;
		ymappings = null;  
	}
	public void reinit() {
		init();
// Make sure that SpectrumCanvas runs PhaseCanvas's reinit()
		repaint();
	}
	public void init() {
		movingharmonic = false;
		lastHhair = new pointpairs(0,0,0,0);
		thisHhair = new pointpairs(0,0,0,0);
		harmsegments = new pointpairs[0];
//		init_readouts();  (the only difference from SpectrumCanvas)
		lastsel = new harmonic();
	}
	public void handle_mousepress(Graphics g, int x, int y) {
		if (crosshairsDMZ(x,y))  {
			toolkit.beep();
			return;
		}
		double xx = unconvertx(x);
		double phaselocnow = unconverty(y);
		int h = lastsel.getharmnum();
		if (ss.boolharms.get(h) == true) {
				int h_ind = ss.harmindexes[h];
				double phaseset = ss.sharcdata[h_ind].getphase();
				if (Math.abs(phaselocnow - phaseset) < 30d) {
						mycursor.setmoveharm();
						movingharmonic = true;
						whichmoveharm = h;  // a bit of a sloppy hack...
						return;  // let the DRAG function handle data changes. bye
				}
					else {
						toolkit.beep();
						return;
					}
		}
			else {
				toolkit.beep();
				return;
			}
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
		int yy = converty(0d);
		g.drawLine(lM,yy,innerright,yy);
	}
}
class SpectrumCanvas extends myPlotCanvas {
// harmsegments[] are the x,y coordinates for lines to draw representing
// harmonics.  The indexes of the array reflect, like the sharcdata[]
// array,  the *order* in which the harmonics were entered, *not* the 
// harmonic number of the complex tone.  
	public pointpairs[] harmsegments;
	public Color crosshair_color;
	protected pointpairs lastVhair, lastHhair, thisVhair, thisHhair;
	public TextField harmtext, phasetext, dbtext, fundamentaltext, frequencytext;
	public harmonic lastsel;
	public WaveformCanvas gcWave;
	public PhaseCanvas gcPhase;
	public PlotCanvasControls controls;
	public Toolkit toolkit;
	public CursorState mycursor;
	public boolean movingharmonic, isSpectrumCanvas, makeVisible;
	public sharctimbre ss;
// The harmonic number (in terms of multiple of the fundamental) which
// is being dragged.
	int whichmoveharm;
	public SpectrumCanvas(sharctimbre s, PlotCanvasControls c) {
		super();
		ss = s;
		crosshair_color = Color.green;
		setColors(Color.black,Color.gray);
		controls = c;
//		this.enableEvents(AWTEvent.MOUSE_EVENT_MASK);
//		this.enableEvents(AWTEvent.MOUSE_MOTION_EVENT_MASK);
//		this.enableEvents(AWTEvent.KEY_EVENT_MASK);
		this.enableEvents(AWTEvent.MOUSE_EVENT_MASK | 
			AWTEvent.MOUSE_MOTION_EVENT_MASK | AWTEvent.KEY_EVENT_MASK);
		this.requestFocus();
		toolkit = this.getToolkit();
		isSpectrumCanvas = 
			(this.toString()).startsWith("SpectrumCanvas") == true;
		if (isSpectrumCanvas)  {
				harmtext = new TextField(3);
				dbtext = new TextField(3);
				phasetext = new TextField(4);
				frequencytext = new TextField(4);
				fundamentaltext = new TextField(3);
		}
			else {
				harmtext = controls.gcSpect.harmtext;
				phasetext = controls.gcSpect.phasetext;
				frequencytext = controls.gcSpect.frequencytext;
				dbtext = controls.gcSpect.dbtext;
			}
		init();
	}
	public void create(int llM, int lrM, int ltM, int lbM, int w, int h) {
		setSize(w,h);
		setbox(llM, lrM, ltM, lbM);
// System.out.println("GRect = " + rectPrint(GRect) + " GbRect = " +
// rectPrint(GbRect));
		setboxdataspace(0d,1000d,-25d,0d);
		makeAxisGraphic("y","left","Amplitude (dB)",yticlocs,"in");
		makeAxisGraphic("x","bot","Frequency (Hz)",xticlocs,"out");
		ss.harms2segments(this);
		xmappings = null;
		ymappings = null;  
	}
	public String rectPrint(Rectangle r) {
		return "x = " + r.x + " y = " + r.y + " height = "
			+ r.height + " width = " + r.width;
	}
	public void paint(Graphics g) { 
		if (isVisible() == false) return;
		boundingbox(g);
		for (int i=0; i < harmsegments.length; i++)
			drawsegment(g,harmsegments[i]);
		if (leftAxisGraphic != null)
			leftAxisGraphic.draw(g);
		if (rightAxisGraphic != null)
			rightAxisGraphic.draw(g);
		if (topAxisGraphic != null)
			topAxisGraphic.draw(g);
		if (botAxisGraphic != null)
			botAxisGraphic.draw(g);
	}
	public void printallharmsegments() {
		for (int i=0; i < harmsegments.length; i++)
			harmsegments[i].print();
	}
	public void reinit() {
		init();
        ss.init();
        init_readouts();
        gcWave.repaint();
				gcPhase.reinit();   // hope this should be here...
        if (ss.wave != null) {
            ss.wave.stop();
            ss.wave = null;
        }
		repaint();
	}
	public void init() {
		movingharmonic = false;
		lastHhair = new pointpairs(0,0,0,0);
		thisHhair = new pointpairs(0,0,0,0);
		harmsegments = new pointpairs[0];
		init_readouts();
		lastsel = new harmonic();
	}
	public void init_readouts() {
		harmtext.setText("---");
		dbtext.setText("---");
		phasetext.setText("----");
		frequencytext.setText("----");
		fundamentaltext.setText("---");
	}

	public void processKeyEvent(KeyEvent e) {
		if (e.getID() == KeyEvent.KEY_TYPED) {
				System.out.println("got a key event in canvas");
				if (e.getKeyCode() == KeyEvent.VK_CONTROL)
					System.out.println("...and it was the ctrl key");
		}
			else
				super.processKeyEvent(e);
	}
	public void keyPressed(KeyEvent e) {
		System.out.println("got a key press in canvas");
	}
		
	public void processMouseMotionEvent(MouseEvent e) {
		int x = e.getX();
		int y = e.getY();
		int ee = e.getID();
		int h, h_ind;
		Graphics g = getGraphics(); 
		switch(ee) {
			case MouseEvent.MOUSE_MOVED:
				if (crosshairsDMZ(x,y)) {
					mycursor.setdef();
					return;
				}
				mycursor.setcross();
				h = resolveXtoharm(x);
				display_frequency(g,h,x,y);
				display_harmonic(g,x,y);
				h_ind = ss.boolharms.get(h) == true ? ss.harmindexes[h] : -1;
				if ((this.toString()).startsWith("SpectrumCanvas") == true)  {
//					Even though we are in the spectrum canvas, display the phase
//					setting for this harmonic
						if (h_ind >= 0) {  // pretty dumb hack
							display_phase(g,ss.sharcdata[h_ind].getphase());
						}	
						display_decibel(g,x,y);
				}
					else {
//					Even though we are in the phase canvas, display the db
//					setting for this harmonic
						display_phase(g,x,y);
						if (h_ind >= 0) {  // pretty dumb hack
							display_decibel(g,ss.sharcdata[h_ind].getdb());
						}
					}
				double dfreq = mousefrequency(x,h);
				double yy = unconverty(y);
				lastsel.set(dfreq,yy,0d,h);
				break;
			case MouseEvent.MOUSE_DRAGGED:
				if (crosshairsDMZ(x,y)) {
					if (movingharmonic) {
						erase_crosshair(g);
						movingharmonic = false;
					}
					mycursor.setdef();
					return;
				}
				if (movingharmonic) {
					erase_crosshair(g);
					h_ind = ss.harmindexes[whichmoveharm];
					g.setColor(background_color);
					drawsegment(g,harmsegments[h_ind]);
					if (isSpectrumCanvas) {
							double thisdb = unconverty(y);
							ss.sharcdata[h_ind].setdb(thisdb);
							harmsegments[h_ind].p1.y = converty(thisdb);
					}
						else { // must be a PhaseCanvas
							double thisphase = unconverty(y);
							ss.sharcdata[h_ind].setphase(thisphase);
							harmsegments[h_ind].p1.y = converty(thisphase);
					}
					g.setColor(foreground_color);
					drawsegment(g,harmsegments[h_ind]);
					crosshair(g,x,y);
					ss.makesamps();
					ss.samps2segments(gcWave);
					gcWave.redraw_wave(gcWave.getGraphics());
//					gcWave.repaint();
				}
//				if (crosshairsDMZ(x,y)) return;
//				crosshair(g,x,y);
				break;	
			default:
				super.processMouseMotionEvent(e);  // Important!
				break;
		}
	}
	public boolean crosshairsDMZ(int x, int y) {
		double fund = ss.getfund();
		double hf = fund/2d;
		return (!GbRect.contains(x,y)) || (unconvertx(x) < (fund - hf));
	}

	public void processMouseEvent(MouseEvent e) {
		int x = e.getX();
		int y = e.getY();
		int ee = e.getID();
		Graphics g = getGraphics(); 
		switch(ee) {
			case MouseEvent.MOUSE_ENTERED: 
				mycursor.setcross();
				break;
			case MouseEvent.MOUSE_EXITED:
				mycursor.setdef();
				break;
			case MouseEvent.MOUSE_PRESSED:
				handle_mousepress(g, x,y);
				break;
			case MouseEvent.MOUSE_RELEASED:
				if (movingharmonic) {
					movingharmonic = false;
					erase_crosshair(g);
					lastHhair.set(0,0,0,0);
					repaint();
				}
				break;
			default:
	    		super.processMouseEvent(e);  // Important!
				break;
		}
	}
	public void handle_mousepress(Graphics g, int x, int y) {
		if (crosshairsDMZ(x,y))  {
			toolkit.beep();
			return;
		}
		double xx = unconvertx(x);
		if (ss.nofundamental) {  // first harmonic on a blank canvas
				ss.nofundamental = false;
				ss.boolharms.set(1);
				ss.fund = xx;
				ss.nharms = 0;
				lastsel.setharmnum(1);
				ss.sharcdata[ss.nharms] = new harmonic(lastsel);
				ss.harmindexes[1] = 0;
				++ss.nharms;
				ss.makesamps();
				gcWave.recreate();
				display_harmonic(g,x,y);
				display_fundamental(g);
				ss.samps2segments(gcWave);
				if (ss.wave == null) {
					ss.wave = new PoskanzerAudioClip(ss.samps.b);
					if (gcWave.soundon)
						ss.wave.loop();
				}
		}
			else {  // 1 or more harmonics already present
				double dblocnow = unconverty(y);
				int h = lastsel.getharmnum();
				if (ss.boolharms.get(h) == true) {  // already selected
						int h_ind = ss.harmindexes[h];
						double dbset = ss.sharcdata[h_ind].getdb();
//					Is the user grabbing the harmonic?
						if (Math.abs(dblocnow - dbset) < 3d) {
								mycursor.setmoveharm();
								movingharmonic = true;
								whichmoveharm = h;  // a bit of a sloppy hack...
								return;  // let the DRAG function update the data
						}
							else {  // they didn't 'grab' close enough!
								toolkit.beep();
								return;
							}
				}
					else {   // A new harmonic is born!
						if (ss.boolharms.get(h) == false) {
							ss.boolharms.set(lastsel.getharmnum());
							ss.sharcdata[ss.nharms] = new harmonic(lastsel);
							ss.harmindexes[lastsel.getharmnum()] = ss.nharms;
							++ss.nharms;
						}
					}
			}
//	We get here if a new harmonic (first or subsequent) has been created
		ss.makesamps();
		ss.samps2segments(gcWave);
		ss.harms2segments(this);
		ss.harms2segments(gcPhase);
		repaint();
		gcWave.repaint();
		gcPhase.repaint();
	}
	public void erase_crosshair(Graphics g) {
		g.setColor(background_color);
		drawsegment(g,lastHhair);
		int x, y;
		g.setColor(foreground_color);
		for (int i=0; i < ss.nharms; i++) {
			x = convertx(ss.sharcdata[i].getfreq());
			y = isSpectrumCanvas ? converty(ss.sharcdata[i].getdb())
				: converty(ss.sharcdata[i].getphase());
			if (lastHhair.p1.y > y)
				g.drawLine(x,lastHhair.p1.y,x,lastHhair.p1.y);
		}
	}
	public int resolvefreqtoharm(double freq) {
		if (ss.nofundamental) 
			return(0);
		double fund = ss.getfund();
		double hf = fund/2d;	
		int rawharm = (int)(freq/fund);
		double rem = ss.fmod(freq,fund);
		if (rem >= hf) {
				++rawharm;
		}
		return rawharm;
	}
	public int resolveXtoharm(int x) {
		return resolvefreqtoharm(unconvertx(x));
	}
	public double mousefrequency(int x, int h) {
		double xx = unconvertx(x);
		double ans = ss.nofundamental ? xx : ss.fund * (double)h;
		return(ans);
	}
	public void display_frequency	(Graphics g, int h, int x, int y) {
		int ifreq = (int)mousefrequency(x,h);
		frequencytext.setText(new Integer(ifreq).toString());
	}
	public void display_fundamental	(Graphics g) {
		String tempstring;
		if (ss.nofundamental)
				tempstring = new String("---");
			else
				tempstring = new Integer((int)ss.fund).toString();
		fundamentaltext.setText(tempstring);
	}
	public void display_harmonic(Graphics g, int x, int y) {
		String temptext;
		if (ss.nofundamental)
				temptext = new String("---");
			else 
				temptext = new Integer(resolveXtoharm(x)).toString();
		harmtext.setText(temptext);
	}
	public void display_decibel(Graphics g, int x, int y) {
		double yy = unconverty(y);
		dbtext.setText(new Integer((int)yy).toString());
	}
	public void display_decibel(Graphics g, double db) {
		dbtext.setText(new Integer((int)db).toString());
	}
	public void display_phase(Graphics g, int x, int y) {
		double yy = unconverty(y);
		phasetext.setText(new Integer((int)yy).toString());
	}
	public void display_phase(Graphics g, double phase) {
		phasetext.setText(new Integer((int)phase).toString());
	}
	public void crosshair(Graphics g, int x, int y) {
		double fund, dfreq;
		int harm, ifreq;

		g.setColor(crosshair_color);
		thisHhair.set(lM+1,y,innerright-1,y);
		drawsegment(g,thisHhair);
		double xx = unconvertx(x);
		double yy = unconverty(y);
		if (ss.nofundamental) {
				dfreq = xx;
				harm = 0;
		}
			else {
				harm = resolvefreqtoharm(xx);
				dfreq = (double)harm * ss.fund;
			}
		harmtext.setText(new Integer(harm).toString());
		frequencytext.setText(new Integer((int)dfreq).toString());
		if (isSpectrumCanvas)
				dbtext.setText(new Integer((int)yy).toString());
			else  
				phasetext.setText(new Integer((int)yy).toString());
				
//		lastVhair.copy(thisVhair);
		lastHhair.copy(thisHhair);
		if (isSpectrumCanvas)
				lastsel.set(dfreq,yy,0d,harm);
			else
				lastsel.set(dfreq,0d,yy,harm); // is the 0d okay?
	}
}


