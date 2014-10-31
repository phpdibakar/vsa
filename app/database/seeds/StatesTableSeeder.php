<?php

class StatesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('states')->delete();
        
		\DB::table('states')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'Alabama',
				'code' => 'AL',
				'country_id' => 1,
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'Alaska',
				'code' => 'AK',
				'country_id' => 1,
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'Arizona',
				'code' => 'AZ',
				'country_id' => 1,
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'Arkansas',
				'code' => 'AR',
				'country_id' => 1,
			),
			4 => 
			array (
				'id' => 5,
				'name' => 'California',
				'code' => 'CA',
				'country_id' => 1,
			),
			5 => 
			array (
				'id' => 6,
				'name' => 'Colorado',
				'code' => 'CO',
				'country_id' => 1,
			),
			6 => 
			array (
				'id' => 7,
				'name' => 'Connecticut',
				'code' => 'CT',
				'country_id' => 1,
			),
			7 => 
			array (
				'id' => 8,
				'name' => 'Delaware',
				'code' => 'DE',
				'country_id' => 1,
			),
			8 => 
			array (
				'id' => 9,
				'name' => 'Florida',
				'code' => 'FL',
				'country_id' => 1,
			),
			9 => 
			array (
				'id' => 10,
				'name' => 'Georgia',
				'code' => 'GA',
				'country_id' => 1,
			),
			10 => 
			array (
				'id' => 11,
				'name' => 'Hawaii',
				'code' => 'HI',
				'country_id' => 1,
			),
			11 => 
			array (
				'id' => 12,
				'name' => 'Idaho',
				'code' => 'ID',
				'country_id' => 1,
			),
			12 => 
			array (
				'id' => 13,
				'name' => 'Illinois',
				'code' => 'IL',
				'country_id' => 1,
			),
			13 => 
			array (
				'id' => 14,
				'name' => 'Indiana',
				'code' => 'IN',
				'country_id' => 1,
			),
			14 => 
			array (
				'id' => 15,
				'name' => 'Iowa',
				'code' => 'IA',
				'country_id' => 1,
			),
			15 => 
			array (
				'id' => 16,
				'name' => 'Kansas',
				'code' => 'KS',
				'country_id' => 1,
			),
			16 => 
			array (
				'id' => 17,
				'name' => 'Kentucky',
				'code' => 'KY',
				'country_id' => 1,
			),
			17 => 
			array (
				'id' => 18,
				'name' => 'Louisiana',
				'code' => 'LA',
				'country_id' => 1,
			),
			18 => 
			array (
				'id' => 19,
				'name' => 'Maine',
				'code' => 'ME',
				'country_id' => 1,
			),
			19 => 
			array (
				'id' => 20,
				'name' => 'Maryland',
				'code' => 'MD',
				'country_id' => 1,
			),
			20 => 
			array (
				'id' => 21,
				'name' => 'Massachusetts',
				'code' => 'MA',
				'country_id' => 1,
			),
			21 => 
			array (
				'id' => 22,
				'name' => 'Michigan',
				'code' => 'MI',
				'country_id' => 1,
			),
			22 => 
			array (
				'id' => 23,
				'name' => 'Minnesota',
				'code' => 'MN',
				'country_id' => 1,
			),
			23 => 
			array (
				'id' => 24,
				'name' => 'Mississippi',
				'code' => 'MS',
				'country_id' => 1,
			),
			24 => 
			array (
				'id' => 25,
				'name' => 'Missouri',
				'code' => 'MO',
				'country_id' => 1,
			),
			25 => 
			array (
				'id' => 26,
				'name' => 'Montana',
				'code' => 'MT',
				'country_id' => 1,
			),
			26 => 
			array (
				'id' => 27,
				'name' => 'Nebraska',
				'code' => 'NE',
				'country_id' => 1,
			),
			27 => 
			array (
				'id' => 28,
				'name' => 'Nevada',
				'code' => 'NV',
				'country_id' => 1,
			),
			28 => 
			array (
				'id' => 29,
				'name' => 'New Hampshire',
				'code' => 'NH',
				'country_id' => 1,
			),
			29 => 
			array (
				'id' => 30,
				'name' => 'New Jersey',
				'code' => 'NJ',
				'country_id' => 1,
			),
			30 => 
			array (
				'id' => 31,
				'name' => 'New Mexico',
				'code' => 'NM',
				'country_id' => 1,
			),
			31 => 
			array (
				'id' => 32,
				'name' => 'New York',
				'code' => 'NY',
				'country_id' => 1,
			),
			32 => 
			array (
				'id' => 33,
				'name' => 'North Carolina',
				'code' => 'NC',
				'country_id' => 1,
			),
			33 => 
			array (
				'id' => 34,
				'name' => 'North Dakota',
				'code' => 'ND',
				'country_id' => 1,
			),
			34 => 
			array (
				'id' => 35,
				'name' => 'Ohio',
				'code' => 'OH',
				'country_id' => 1,
			),
			35 => 
			array (
				'id' => 36,
				'name' => 'Oklahoma',
				'code' => 'OK',
				'country_id' => 1,
			),
			36 => 
			array (
				'id' => 37,
				'name' => 'Oregon',
				'code' => 'OR',
				'country_id' => 1,
			),
			37 => 
			array (
				'id' => 38,
				'name' => 'Pennsylvania',
				'code' => 'PA',
				'country_id' => 1,
			),
			38 => 
			array (
				'id' => 39,
				'name' => 'Rhode Island',
				'code' => 'RI',
				'country_id' => 1,
			),
			39 => 
			array (
				'id' => 40,
				'name' => 'South Carolina',
				'code' => 'SC',
				'country_id' => 1,
			),
			40 => 
			array (
				'id' => 41,
				'name' => 'South Dakota',
				'code' => 'SD',
				'country_id' => 1,
			),
			41 => 
			array (
				'id' => 42,
				'name' => 'Tennessee',
				'code' => 'TN',
				'country_id' => 1,
			),
			42 => 
			array (
				'id' => 43,
				'name' => 'Texas',
				'code' => 'TX',
				'country_id' => 1,
			),
			43 => 
			array (
				'id' => 44,
				'name' => 'Utah',
				'code' => 'UT',
				'country_id' => 1,
			),
			44 => 
			array (
				'id' => 45,
				'name' => 'Vermont',
				'code' => 'VT',
				'country_id' => 1,
			),
			45 => 
			array (
				'id' => 46,
				'name' => 'Virginia',
				'code' => 'VA',
				'country_id' => 1,
			),
			46 => 
			array (
				'id' => 47,
				'name' => 'Washington',
				'code' => 'WA',
				'country_id' => 1,
			),
			47 => 
			array (
				'id' => 48,
				'name' => 'West Virginia',
				'code' => 'WV',
				'country_id' => 1,
			),
			48 => 
			array (
				'id' => 49,
				'name' => 'Wisconsin',
				'code' => 'WI',
				'country_id' => 1,
			),
			49 => 
			array (
				'id' => 50,
				'name' => 'Wyoming',
				'code' => 'WY',
				'country_id' => 1,
			),
			50 => 
			array (
				'id' => 60,
				'name' => 'Alberta',
				'code' => 'AB',
				'country_id' => 2,
			),
			51 => 
			array (
				'id' => 61,
				'name' => 'British Columbia',
				'code' => 'BC',
				'country_id' => 2,
			),
			52 => 
			array (
				'id' => 62,
				'name' => 'Manitoba',
				'code' => 'MB',
				'country_id' => 2,
			),
			53 => 
			array (
				'id' => 63,
				'name' => 'New Brunswick',
				'code' => 'NB',
				'country_id' => 2,
			),
			54 => 
			array (
				'id' => 64,
				'name' => 'Newfoundland and Labrador',
				'code' => 'NL',
				'country_id' => 2,
			),
			55 => 
			array (
				'id' => 65,
				'name' => 'Nova Scotia',
				'code' => 'NS',
				'country_id' => 2,
			),
			56 => 
			array (
				'id' => 66,
				'name' => 'Ontario',
				'code' => 'ON',
				'country_id' => 2,
			),
			57 => 
			array (
				'id' => 67,
				'name' => 'Prince Edward Island',
				'code' => 'PE',
				'country_id' => 2,
			),
			58 => 
			array (
				'id' => 68,
				'name' => 'Quebec',
				'code' => 'QC',
				'country_id' => 2,
			),
			59 => 
			array (
				'id' => 69,
				'name' => 'Saskatchewan',
				'code' => 'SK',
				'country_id' => 2,
			),
		));
	}

}
