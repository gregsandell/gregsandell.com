import sun.audio.*;
import java.io.*;
public class PoskanzerAudioClip {  //  implements AudioClip
    AudioData data;
    InputStream stream;
	public PoskanzerAudioClip(byte[] ssamps) {
		data = new AudioData( ssamps );
	}

    private static final int[] expLut = {
	0, 0, 1, 1, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 
	4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 
	5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 
	5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 
	6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 
	6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 
	6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 
	6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 
	7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 
	7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 
	7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 
	7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 
	7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 
	7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 
	7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 
	7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7
	};
    private static final int CLIP = 32635;
    private static final int BIAS = 0x84;

    
	public static byte toUlaw( int linear ) {
		int sign, exponent, mantissa;
		byte ulaw;
		// Get the sample into sign-magnitude.
		if ( linear >= 0 )
				sign = 0;
			else {
				sign = 0x80;
				linear = -linear;
			}
			if ( linear > CLIP )
				linear = CLIP;	// clip the magnitude
			// Convert from 16 bit linear to ulaw.
			linear = linear + BIAS;
			exponent = expLut[( linear >> 7 ) & 0xFF];
			mantissa = ( linear >> ( exponent + 3 ) ) & 0x0F;
			ulaw = (byte) ( ~ ( sign | ( exponent << 4 ) | mantissa ) );
			return ulaw;
	}
    
	public synchronized void play() {
		stop();
		if ( data != null ) {
			stream = new AudioDataStream( data );
			AudioPlayer.player.start( stream );
		}
	}

	public synchronized void loop() {
		stop();
		if ( data != null ) {
			stream = new ContinuousAudioDataStream( data );
			AudioPlayer.player.start( stream );
		}
	}
    
	public synchronized void stop() {
		if ( stream != null ) {
			AudioPlayer.player.stop( stream );
			try {
				stream.close();
			}
			catch ( IOException iignore ) {}
			stream = null;
		}
	}
}


	
