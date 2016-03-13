

/*
 * Nice Numbers for Graph Labels
 * by Paul Heckbert
 * from "Graphics Gems", Academic Press, 1990
 */

/*
 * label.c: demonstrate nice graph labeling
 *
 * Paul Heckbert        2 Dec 88
 */



/* main(ac, av)
int ac;
char **av;
{
    double*locs,  min, max;
	int i, NTICK;

    if (ac!=4) {
        fprintf(stderr, "Usage: label <min> <max> <nticks>\n");
        exit(1);
    }
    min = atof(av[1]);
    max = atof(av[2]);
    NTICK = atoi(av[3]);
	locs = (double *)malloc(NTICK * sizeof(double));

    NTICK = ticlocs(min, max,NTICK,locs);
	for (i = 0; i < NTICK; i++)
		fprintf(stdout, "%f\n",locs[i]);
}    */

/*
 * loose_label: demonstrate loose labeling of data range from min to max.
 * (tight method is similar)
 */

public class ticlocs {
	double[] locs;
	int numlocs;
	public ticlocs(double min, double max,int NTICK) {
	    int i, nfrac;
	    double d;                           /* tick mark spacing */
	    double graphmin, graphmax;          /* graph range min and max */
	    double range, x;
	
	    /* we expect min!=max */
	    range = nicenum(max-min, false);
	    d = nicenum(range/(NTICK-1), true);
System.out.println("nicenum ranges = " + range + " and " + d);
	    graphmin = Math.floor(min/d)*d;
	    graphmax = Math.ceil(max/d)*d;
System.out.println("graphmin = " + graphmin + " graphmax = " + graphmax);
	    nfrac = (int)Math.max(-Math.floor(log10(d)), 0d);   /* # of fractional digits to show */
	
	    for (x=graphmin, i = 0; x<graphmax+.5d*d; x+=d, i++) { }
			locs = new double[i];
	    for (x=graphmin, i = 0; x<graphmax+.5d*d; x+=d, i++) {
				locs[i] = x;
	    }
		numlocs = i;
System.out.println("numlocs = " + numlocs);
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

