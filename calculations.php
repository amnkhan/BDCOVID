<?php
define( 'ORIGIN', true );
//update data file every 6 hour
require __DIR__ . '/value-update-engine.php';

function initialize() {
	$update = null;
	if ( isset( $_GET['update'] ) ) {
		$update = $_GET['update'];
	}
	$fileMTime = filemtime( "store.json" );
	if ( time() - 21600 > $fileMTime || $update == 'now' ) {
		echo "<script>console.log('Engine running');</script>";
		$data = run_update();
		if ( ! is_null( $data ) ) {
			$data                                = json_decode( $data, true );
			$json                                = file_get_contents( 'store.json' );
			$json                                = json_decode( $json, true );
			$json['date'][]                      = $data['today_daily_count'][0]['Date'];
			$json['date']                        = array_unique( $json['date'] );
			$lastKey                             = key( array_slice( $json['date'], - 1, 1, true ) );
			$json['confirmed_cases'][ $lastKey ] = $data['today_daily_count'][0]['Cumulative_Confirmed_Cases'];
			$json['death'][ $lastKey ]           = $data['today_daily_count'][0]['Cumulative_Death'];
			$json['recovery'][ $lastKey ]        = $data['today_daily_count'][0]['Cumulative_Recovery'];


			$fp = fopen( 'store.json', 'w' );
			fwrite( $fp, json_encode( $json ) );
			fclose( $fp );
			//			pri_dump($json);
//			pri_dump($data);
			$ApiDist         = $data['district_wise_cases'];
			$districts       = file_get_contents( 'district_final.json' );
			$districts_array = json_decode( $districts, true );
			$districts       = $districts_array['features'];
			$props           = array_column( $districts, 'properties' );

//			pri_dump($ApiDist);
			foreach ( $props as $key => $prop ) {
				$value = search( $ApiDist, 'district_city_eng', $prop['name'] );
				if ( count( $value ) > 0 ) {
					$districts_array['features'][ $key ]['properties']['p'] = $value[0]['cases'];
				}
			}
//			pri_dump( $districts_array );
			$dp = fopen( 'district_final.json', 'w' );
			fwrite( $dp, json_encode( $districts_array ) );
			fclose( $dp );
		}
	}

	$json = file_get_contents( 'store.json' );
	echo "<script>window.covidData = " . $json . " </script>";

}

function search( $array, $key, $value ) {
	$results = array();

	if ( is_array( $array ) ) {
		if ( isset( $array[ $key ] ) && $array[ $key ] == $value ) {
			$results[] = $array;
		}

		foreach ( $array as $subarray ) {
			$results = array_merge( $results, search( $subarray, $key, $value ) );
		}
	}

	return $results;
}

function pri_dump( $data ) {
	echo '<pre>';
	if ( is_object( $data ) || is_array( $data ) ) {
		print_r( $data );
	} else {
		var_dump( $data );
	}
	echo '</pre>';
}

//initialize();
?>