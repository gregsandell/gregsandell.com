import java.awt.*;

/**
 * This class implements the sliding portion of the
 * Slider class.
 */
public class SliderArea extends Panel {

   /**
    * The maximum value of the slider.
    */
   int   max;

   /**
    * The current value of the slider.
    */
   int   value;

   /**
    * The preferred width and height.
    */
   int   sWidth,sHeight;

   /**
    * An off-screen image and its Graphics.
    */
   Image    image;
   Graphics gi;

   /**
    * The observer to be notified upon slider changes.
    */
   SliderObserver obs;

   /**
    * The constructor.
    * @param val the initial value of the slider
    * @param max the maximum value of the slider (0-max)
    * @param w the preferred width to be assumed
    * @param h the preferred height to be assumed 
    * @param so the observer to be notified upon slider changes.
    */
   SliderArea(int val,int max,int w, int h,SliderObserver so) {
      obs=so;
      setLayout(null);
      this.max=max;
      value=val;
      sWidth=w;
      sHeight=h;
   }

   /**
    * The preferred size
    */
   public Dimension preferredSize() {
      return new Dimension(sWidth,sHeight);
   }

   /**
    * The minimum size
    */
   public Dimension minimumSize() {
      return new Dimension(sWidth,sHeight);
   }

   /**
    * I prefer to use my update, so that no clean will be performed
    * before my paint routine.
    */
   public void update(Graphics g) {
      paint(g);
   }

   /**
    * The paint routine.
    */
   public void paint(Graphics g) {
      //It seems that the awt will be able to create
      //an off-screen image, only when the component
      //has been already displayed (...am I wrong!?).
      //So I have to create it the first time
      //the paint method is called.
      if (image==null) image=createImage(sWidth,sHeight);

      //If I have my off-screen image, I want its Graphics too!
      if (gi==null && image!=null) gi=image.getGraphics();

      //If I have its Graphics, I can begin painting the component.
      if (gi!=null) {
	 //Draw a 3D background.
         gi.setColor(Color.lightGray);
         gi.fill3DRect(0,0,size().width,size().height,true);

	 //Calculate the position of the inset to be drawn.
         //The inset is where the cursor will slide on,
         //and is made up of two adjacent lines of a darker
	 //and a brighter color.
         int y;
         if ((size().height%2)==0) y=size().height/2;
         else y=size().height/2+1;
         gi.setColor(Color.gray);
         gi.drawLine(4,y-1,size().width-5,y-1);;
         gi.setColor(Color.white);
         gi.drawLine(4,y,size().width-5,y);;

	 //Calculate the x position of the cursor.
         //The cursor is made up of a simple 3D square.
         int x=(int)(((double)(size().width-14)/(double)max)*(double)value);
         gi.setColor(Color.lightGray);
         gi.fill3DRect(2+x,1,10,size().height-2,true);

	 //Now I can draw my ready component on the screen.
	 g.drawImage(image,0,0,this);
      }
   }

   /**
    * Set a new slider value.
    * @param v the value to be forced.
    */
   public void setValue(int v) {
      value=v;
      repaint();
   }
                       
   /**
    * Here I catch the drag events.
    */
   public boolean mouseDrag(Event evt, int x, int y) {
      //Calculate the new value.
      x-=7;
      if (x<0) x=0;
      if (x>(size().width-14)) x=(size().width-14);
      value=(int)(((double)max/(double)(size().width-14))*(double)x);
      //This is not a good piece of code!
      //I call my parent's setValue() method,
      //so that it will update the value area.
      if (getParent() instanceof Slider)
            ((Slider)getParent()).setValue(value);
      //Notify the observer of the new value.
      if (obs!=null) obs.newSliderValue(value);
      //Redraw the component.
      repaint();
      return true;
   }

}
/**
 * I subclassed the TextField component to implement
 * the value area. Actually the ValueArea class doesn't extends
 * any method, by now.
 */
class ValueArea extends TextField {

   /**
    * The constructor.
    * @param s the initial text.
    * @param i the length.
    */
   ValueArea(String s, int i) {
      super(s,i);
   }

}

/**
 * This is the interface to be implemented by any class
 * that want to be notified of slider changes.
 */
interface SliderObserver {

   public void newSliderValue(int v);
}

/**
 * This is the main Slider class that wraps the
 * the SliderArea and the ValueArea.
 * This is the one to be instantiated.
 * @see #SliderArea
 * @see #SliderValue
 * @see #SliderObserver
 */
class Slider extends Panel {
   /**
    * The sub-components that constitute the slider.
    */
   SliderArea  slider;
   ValueArea   value;

   /**
    * The maximum value.
    */
   int         max;

   /**
    * The observer.
    */
   SliderObserver obs;

   /**
    * The complete constructor.
    * @param s the label.
    * @param val the initial value.
    * @param max the maximum value.
    * @param w the preferred width.
    * @param h the preferred height.
    * @param so the observer.
    * @see #SliderObserver
    */
   Slider(String s, int val, int max, int w, int h, SliderObserver so) {
      obs=so;
      this.max=max;
      value=new ValueArea(
	Integer.toString(val),
	String.valueOf(max).length()
      );
      slider=new SliderArea(val,max,w,h,so);
      add(new Label(s));
      add(slider);
      add(value);
   }

   /**
    * A shorter version of the constructor.
    * This one has default values for preferred width and height.
    * @param s the label.
    * @param val the initial value.
    * @param max the maximum value.
    * @param so the observer.
    * @see #SliderObserver
    */
   Slider(String s,int val, int max, SliderObserver so) {
      this(s,val,max,100,10,so);
   }

   /**
    * Sets the value of the SliderValue text.
    */
   public void setValue(int v) {
      value.setText(String.valueOf(v));
   }

   /**
    * Here I catch the action event on the SliderValue.
    */
   public boolean action(Event e, Object o) {
      return changed(e);
   }

   /**
    * Here I know when something is being typed
    * in the SliderValue.
    */
   public boolean keyUp(Event e, int key) {
      return changed(e);
   }

   /**
    * This is called any time something might have
    * changed the SliderValue, so to test the validity
    * of the number, update the slider and notify the observer.
    */
   public boolean changed(Event e) {
      if (e.target instanceof ValueArea) {
         int v;

         try {
            v=(new Integer(value.getText())).intValue();
         } catch(NumberFormatException exc) {
            v=-1;
         }

         if (v>max) {
            v=max;
            setValue(v);
         } else if (v<0) {
            v=0;
            setValue(v);
         }
         slider.setValue(v);

         if (obs!=null) obs.newSliderValue(v);

         return true;
      }
      return false;
   }
}

