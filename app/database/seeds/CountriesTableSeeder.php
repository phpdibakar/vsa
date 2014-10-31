<?php

class CountriesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('countries')->delete();
        
		\DB::table('countries')->insert(array (
			0 => 
			array (
				'id' => 1,
				'code' => 'US',
				'name' => 'United States',
			),
			1 => 
			array (
				'id' => 2,
				'code' => 'CA',
				'name' => 'Canada',
			),
			2 => 
			array (
				'id' => 3,
				'code' => 'AF',
				'name' => 'Afghanistan',
			),
			3 => 
			array (
				'id' => 4,
				'code' => 'AL',
				'name' => 'Albania',
			),
			4 => 
			array (
				'id' => 5,
				'code' => 'DZ',
				'name' => 'Algeria',
			),
			5 => 
			array (
				'id' => 6,
				'code' => 'DS',
				'name' => 'American Samoa',
			),
			6 => 
			array (
				'id' => 7,
				'code' => 'AD',
				'name' => 'Andorra',
			),
			7 => 
			array (
				'id' => 8,
				'code' => 'AO',
				'name' => 'Angola',
			),
			8 => 
			array (
				'id' => 9,
				'code' => 'AI',
				'name' => 'Anguilla',
			),
			9 => 
			array (
				'id' => 10,
				'code' => 'AQ',
				'name' => 'Antarctica',
			),
			10 => 
			array (
				'id' => 11,
				'code' => 'AG',
				'name' => 'Antigua and/or Barbuda',
			),
			11 => 
			array (
				'id' => 12,
				'code' => 'AR',
				'name' => 'Argentina',
			),
			12 => 
			array (
				'id' => 13,
				'code' => 'AM',
				'name' => 'Armenia',
			),
			13 => 
			array (
				'id' => 14,
				'code' => 'AW',
				'name' => 'Aruba',
			),
			14 => 
			array (
				'id' => 15,
				'code' => 'AU',
				'name' => 'Australia',
			),
			15 => 
			array (
				'id' => 16,
				'code' => 'AT',
				'name' => 'Austria',
			),
			16 => 
			array (
				'id' => 17,
				'code' => 'AZ',
				'name' => 'Azerbaijan',
			),
			17 => 
			array (
				'id' => 18,
				'code' => 'BS',
				'name' => 'Bahamas',
			),
			18 => 
			array (
				'id' => 19,
				'code' => 'BH',
				'name' => 'Bahrain',
			),
			19 => 
			array (
				'id' => 20,
				'code' => 'BD',
				'name' => 'Bangladesh',
			),
			20 => 
			array (
				'id' => 21,
				'code' => 'BB',
				'name' => 'Barbados',
			),
			21 => 
			array (
				'id' => 22,
				'code' => 'BY',
				'name' => 'Belarus',
			),
			22 => 
			array (
				'id' => 23,
				'code' => 'BE',
				'name' => 'Belgium',
			),
			23 => 
			array (
				'id' => 24,
				'code' => 'BZ',
				'name' => 'Belize',
			),
			24 => 
			array (
				'id' => 25,
				'code' => 'BJ',
				'name' => 'Benin',
			),
			25 => 
			array (
				'id' => 26,
				'code' => 'BM',
				'name' => 'Bermuda',
			),
			26 => 
			array (
				'id' => 27,
				'code' => 'BT',
				'name' => 'Bhutan',
			),
			27 => 
			array (
				'id' => 28,
				'code' => 'BO',
				'name' => 'Bolivia',
			),
			28 => 
			array (
				'id' => 29,
				'code' => 'BA',
				'name' => 'Bosnia and Herzegovina',
			),
			29 => 
			array (
				'id' => 30,
				'code' => 'BW',
				'name' => 'Botswana',
			),
			30 => 
			array (
				'id' => 31,
				'code' => 'BV',
				'name' => 'Bouvet Island',
			),
			31 => 
			array (
				'id' => 32,
				'code' => 'BR',
				'name' => 'Brazil',
			),
			32 => 
			array (
				'id' => 33,
				'code' => 'IO',
				'name' => 'British lndian Ocean Territory',
			),
			33 => 
			array (
				'id' => 34,
				'code' => 'BN',
				'name' => 'Brunei Darussalam',
			),
			34 => 
			array (
				'id' => 35,
				'code' => 'BG',
				'name' => 'Bulgaria',
			),
			35 => 
			array (
				'id' => 36,
				'code' => 'BF',
				'name' => 'Burkina Faso',
			),
			36 => 
			array (
				'id' => 37,
				'code' => 'BI',
				'name' => 'Burundi',
			),
			37 => 
			array (
				'id' => 38,
				'code' => 'KH',
				'name' => 'Cambodia',
			),
			38 => 
			array (
				'id' => 39,
				'code' => 'CM',
				'name' => 'Cameroon',
			),
			39 => 
			array (
				'id' => 40,
				'code' => 'CV',
				'name' => 'Cape Verde',
			),
			40 => 
			array (
				'id' => 41,
				'code' => 'KY',
				'name' => 'Cayman Islands',
			),
			41 => 
			array (
				'id' => 42,
				'code' => 'CF',
				'name' => 'Central African Republic',
			),
			42 => 
			array (
				'id' => 43,
				'code' => 'TD',
				'name' => 'Chad',
			),
			43 => 
			array (
				'id' => 44,
				'code' => 'CL',
				'name' => 'Chile',
			),
			44 => 
			array (
				'id' => 45,
				'code' => 'CN',
				'name' => 'China',
			),
			45 => 
			array (
				'id' => 46,
				'code' => 'CX',
				'name' => 'Christmas Island',
			),
			46 => 
			array (
				'id' => 47,
				'code' => 'CC',
			'name' => 'Cocos (Keeling) Islands',
			),
			47 => 
			array (
				'id' => 48,
				'code' => 'CO',
				'name' => 'Colombia',
			),
			48 => 
			array (
				'id' => 49,
				'code' => 'KM',
				'name' => 'Comoros',
			),
			49 => 
			array (
				'id' => 50,
				'code' => 'CG',
				'name' => 'Congo',
			),
			50 => 
			array (
				'id' => 51,
				'code' => 'CK',
				'name' => 'Cook Islands',
			),
			51 => 
			array (
				'id' => 52,
				'code' => 'CR',
				'name' => 'Costa Rica',
			),
			52 => 
			array (
				'id' => 53,
				'code' => 'HR',
			'name' => 'Croatia (Hrvatska)',
			),
			53 => 
			array (
				'id' => 54,
				'code' => 'CU',
				'name' => 'Cuba',
			),
			54 => 
			array (
				'id' => 55,
				'code' => 'CY',
				'name' => 'Cyprus',
			),
			55 => 
			array (
				'id' => 56,
				'code' => 'CZ',
				'name' => 'Czech Republic',
			),
			56 => 
			array (
				'id' => 57,
				'code' => 'DK',
				'name' => 'Denmark',
			),
			57 => 
			array (
				'id' => 58,
				'code' => 'DJ',
				'name' => 'Djibouti',
			),
			58 => 
			array (
				'id' => 59,
				'code' => 'DM',
				'name' => 'Dominica',
			),
			59 => 
			array (
				'id' => 60,
				'code' => 'DO',
				'name' => 'Dominican Republic',
			),
			60 => 
			array (
				'id' => 61,
				'code' => 'TP',
				'name' => 'East Timor',
			),
			61 => 
			array (
				'id' => 62,
				'code' => 'EC',
				'name' => 'Ecudaor',
			),
			62 => 
			array (
				'id' => 63,
				'code' => 'EG',
				'name' => 'Egypt',
			),
			63 => 
			array (
				'id' => 64,
				'code' => 'SV',
				'name' => 'El Salvador',
			),
			64 => 
			array (
				'id' => 65,
				'code' => 'GQ',
				'name' => 'Equatorial Guinea',
			),
			65 => 
			array (
				'id' => 66,
				'code' => 'ER',
				'name' => 'Eritrea',
			),
			66 => 
			array (
				'id' => 67,
				'code' => 'EE',
				'name' => 'Estonia',
			),
			67 => 
			array (
				'id' => 68,
				'code' => 'ET',
				'name' => 'Ethiopia',
			),
			68 => 
			array (
				'id' => 69,
				'code' => 'FK',
			'name' => 'Falkland Islands (Malvinas)',
			),
			69 => 
			array (
				'id' => 70,
				'code' => 'FO',
				'name' => 'Faroe Islands',
			),
			70 => 
			array (
				'id' => 71,
				'code' => 'FJ',
				'name' => 'Fiji',
			),
			71 => 
			array (
				'id' => 72,
				'code' => 'FI',
				'name' => 'Finland',
			),
			72 => 
			array (
				'id' => 73,
				'code' => 'FR',
				'name' => 'France',
			),
			73 => 
			array (
				'id' => 74,
				'code' => 'FX',
				'name' => 'France, Metropolitan',
			),
			74 => 
			array (
				'id' => 75,
				'code' => 'GF',
				'name' => 'French Guiana',
			),
			75 => 
			array (
				'id' => 76,
				'code' => 'PF',
				'name' => 'French Polynesia',
			),
			76 => 
			array (
				'id' => 77,
				'code' => 'TF',
				'name' => 'French Southern Territories',
			),
			77 => 
			array (
				'id' => 78,
				'code' => 'GA',
				'name' => 'Gabon',
			),
			78 => 
			array (
				'id' => 79,
				'code' => 'GM',
				'name' => 'Gambia',
			),
			79 => 
			array (
				'id' => 80,
				'code' => 'GE',
				'name' => 'Georgia',
			),
			80 => 
			array (
				'id' => 81,
				'code' => 'DE',
				'name' => 'Germany',
			),
			81 => 
			array (
				'id' => 82,
				'code' => 'GH',
				'name' => 'Ghana',
			),
			82 => 
			array (
				'id' => 83,
				'code' => 'GI',
				'name' => 'Gibraltar',
			),
			83 => 
			array (
				'id' => 84,
				'code' => 'GR',
				'name' => 'Greece',
			),
			84 => 
			array (
				'id' => 85,
				'code' => 'GL',
				'name' => 'Greenland',
			),
			85 => 
			array (
				'id' => 86,
				'code' => 'GD',
				'name' => 'Grenada',
			),
			86 => 
			array (
				'id' => 87,
				'code' => 'GP',
				'name' => 'Guadeloupe',
			),
			87 => 
			array (
				'id' => 88,
				'code' => 'GU',
				'name' => 'Guam',
			),
			88 => 
			array (
				'id' => 89,
				'code' => 'GT',
				'name' => 'Guatemala',
			),
			89 => 
			array (
				'id' => 90,
				'code' => 'GN',
				'name' => 'Guinea',
			),
			90 => 
			array (
				'id' => 91,
				'code' => 'GW',
				'name' => 'Guinea-Bissau',
			),
			91 => 
			array (
				'id' => 92,
				'code' => 'GY',
				'name' => 'Guyana',
			),
			92 => 
			array (
				'id' => 93,
				'code' => 'HT',
				'name' => 'Haiti',
			),
			93 => 
			array (
				'id' => 94,
				'code' => 'HM',
				'name' => 'Heard and Mc Donald Islands',
			),
			94 => 
			array (
				'id' => 95,
				'code' => 'HN',
				'name' => 'Honduras',
			),
			95 => 
			array (
				'id' => 96,
				'code' => 'HK',
				'name' => 'Hong Kong',
			),
			96 => 
			array (
				'id' => 97,
				'code' => 'HU',
				'name' => 'Hungary',
			),
			97 => 
			array (
				'id' => 98,
				'code' => 'IS',
				'name' => 'Iceland',
			),
			98 => 
			array (
				'id' => 99,
				'code' => 'IN',
				'name' => 'India',
			),
			99 => 
			array (
				'id' => 100,
				'code' => 'ID',
				'name' => 'Indonesia',
			),
			100 => 
			array (
				'id' => 101,
				'code' => 'IR',
			'name' => 'Iran (Islamic Republic of)',
			),
			101 => 
			array (
				'id' => 102,
				'code' => 'IQ',
				'name' => 'Iraq',
			),
			102 => 
			array (
				'id' => 103,
				'code' => 'IE',
				'name' => 'Ireland',
			),
			103 => 
			array (
				'id' => 104,
				'code' => 'IL',
				'name' => 'Israel',
			),
			104 => 
			array (
				'id' => 105,
				'code' => 'IT',
				'name' => 'Italy',
			),
			105 => 
			array (
				'id' => 106,
				'code' => 'CI',
				'name' => 'Ivory Coast',
			),
			106 => 
			array (
				'id' => 107,
				'code' => 'JM',
				'name' => 'Jamaica',
			),
			107 => 
			array (
				'id' => 108,
				'code' => 'JP',
				'name' => 'Japan',
			),
			108 => 
			array (
				'id' => 109,
				'code' => 'JO',
				'name' => 'Jordan',
			),
			109 => 
			array (
				'id' => 110,
				'code' => 'KZ',
				'name' => 'Kazakhstan',
			),
			110 => 
			array (
				'id' => 111,
				'code' => 'KE',
				'name' => 'Kenya',
			),
			111 => 
			array (
				'id' => 112,
				'code' => 'KI',
				'name' => 'Kiribati',
			),
			112 => 
			array (
				'id' => 113,
				'code' => 'KP',
				'name' => 'Korea, Democratic People\'s Republic of',
			),
			113 => 
			array (
				'id' => 114,
				'code' => 'KR',
				'name' => 'Korea, Republic of',
			),
			114 => 
			array (
				'id' => 115,
				'code' => 'KW',
				'name' => 'Kuwait',
			),
			115 => 
			array (
				'id' => 116,
				'code' => 'KG',
				'name' => 'Kyrgyzstan',
			),
			116 => 
			array (
				'id' => 117,
				'code' => 'LA',
				'name' => 'Lao People\'s Democratic Republic',
			),
			117 => 
			array (
				'id' => 118,
				'code' => 'LV',
				'name' => 'Latvia',
			),
			118 => 
			array (
				'id' => 119,
				'code' => 'LB',
				'name' => 'Lebanon',
			),
			119 => 
			array (
				'id' => 120,
				'code' => 'LS',
				'name' => 'Lesotho',
			),
			120 => 
			array (
				'id' => 121,
				'code' => 'LR',
				'name' => 'Liberia',
			),
			121 => 
			array (
				'id' => 122,
				'code' => 'LY',
				'name' => 'Libyan Arab Jamahiriya',
			),
			122 => 
			array (
				'id' => 123,
				'code' => 'LI',
				'name' => 'Liechtenstein',
			),
			123 => 
			array (
				'id' => 124,
				'code' => 'LT',
				'name' => 'Lithuania',
			),
			124 => 
			array (
				'id' => 125,
				'code' => 'LU',
				'name' => 'Luxembourg',
			),
			125 => 
			array (
				'id' => 126,
				'code' => 'MO',
				'name' => 'Macau',
			),
			126 => 
			array (
				'id' => 127,
				'code' => 'MK',
				'name' => 'Macedonia',
			),
			127 => 
			array (
				'id' => 128,
				'code' => 'MG',
				'name' => 'Madagascar',
			),
			128 => 
			array (
				'id' => 129,
				'code' => 'MW',
				'name' => 'Malawi',
			),
			129 => 
			array (
				'id' => 130,
				'code' => 'MY',
				'name' => 'Malaysia',
			),
			130 => 
			array (
				'id' => 131,
				'code' => 'MV',
				'name' => 'Maldives',
			),
			131 => 
			array (
				'id' => 132,
				'code' => 'ML',
				'name' => 'Mali',
			),
			132 => 
			array (
				'id' => 133,
				'code' => 'MT',
				'name' => 'Malta',
			),
			133 => 
			array (
				'id' => 134,
				'code' => 'MH',
				'name' => 'Marshall Islands',
			),
			134 => 
			array (
				'id' => 135,
				'code' => 'MQ',
				'name' => 'Martinique',
			),
			135 => 
			array (
				'id' => 136,
				'code' => 'MR',
				'name' => 'Mauritania',
			),
			136 => 
			array (
				'id' => 137,
				'code' => 'MU',
				'name' => 'Mauritius',
			),
			137 => 
			array (
				'id' => 138,
				'code' => 'TY',
				'name' => 'Mayotte',
			),
			138 => 
			array (
				'id' => 139,
				'code' => 'MX',
				'name' => 'Mexico',
			),
			139 => 
			array (
				'id' => 140,
				'code' => 'FM',
				'name' => 'Micronesia, Federated States of',
			),
			140 => 
			array (
				'id' => 141,
				'code' => 'MD',
				'name' => 'Moldova, Republic of',
			),
			141 => 
			array (
				'id' => 142,
				'code' => 'MC',
				'name' => 'Monaco',
			),
			142 => 
			array (
				'id' => 143,
				'code' => 'MN',
				'name' => 'Mongolia',
			),
			143 => 
			array (
				'id' => 144,
				'code' => 'MS',
				'name' => 'Montserrat',
			),
			144 => 
			array (
				'id' => 145,
				'code' => 'MA',
				'name' => 'Morocco',
			),
			145 => 
			array (
				'id' => 146,
				'code' => 'MZ',
				'name' => 'Mozambique',
			),
			146 => 
			array (
				'id' => 147,
				'code' => 'MM',
				'name' => 'Myanmar',
			),
			147 => 
			array (
				'id' => 148,
				'code' => 'NA',
				'name' => 'Namibia',
			),
			148 => 
			array (
				'id' => 149,
				'code' => 'NR',
				'name' => 'Nauru',
			),
			149 => 
			array (
				'id' => 150,
				'code' => 'NP',
				'name' => 'Nepal',
			),
			150 => 
			array (
				'id' => 151,
				'code' => 'NL',
				'name' => 'Netherlands',
			),
			151 => 
			array (
				'id' => 152,
				'code' => 'AN',
				'name' => 'Netherlands Antilles',
			),
			152 => 
			array (
				'id' => 153,
				'code' => 'NC',
				'name' => 'New Caledonia',
			),
			153 => 
			array (
				'id' => 154,
				'code' => 'NZ',
				'name' => 'New Zealand',
			),
			154 => 
			array (
				'id' => 155,
				'code' => 'NI',
				'name' => 'Nicaragua',
			),
			155 => 
			array (
				'id' => 156,
				'code' => 'NE',
				'name' => 'Niger',
			),
			156 => 
			array (
				'id' => 157,
				'code' => 'NG',
				'name' => 'Nigeria',
			),
			157 => 
			array (
				'id' => 158,
				'code' => 'NU',
				'name' => 'Niue',
			),
			158 => 
			array (
				'id' => 159,
				'code' => 'NF',
				'name' => 'Norfork Island',
			),
			159 => 
			array (
				'id' => 160,
				'code' => 'MP',
				'name' => 'Northern Mariana Islands',
			),
			160 => 
			array (
				'id' => 161,
				'code' => 'NO',
				'name' => 'Norway',
			),
			161 => 
			array (
				'id' => 162,
				'code' => 'OM',
				'name' => 'Oman',
			),
			162 => 
			array (
				'id' => 163,
				'code' => 'PK',
				'name' => 'Pakistan',
			),
			163 => 
			array (
				'id' => 164,
				'code' => 'PW',
				'name' => 'Palau',
			),
			164 => 
			array (
				'id' => 165,
				'code' => 'PA',
				'name' => 'Panama',
			),
			165 => 
			array (
				'id' => 166,
				'code' => 'PG',
				'name' => 'Papua New Guinea',
			),
			166 => 
			array (
				'id' => 167,
				'code' => 'PY',
				'name' => 'Paraguay',
			),
			167 => 
			array (
				'id' => 168,
				'code' => 'PE',
				'name' => 'Peru',
			),
			168 => 
			array (
				'id' => 169,
				'code' => 'PH',
				'name' => 'Philippines',
			),
			169 => 
			array (
				'id' => 170,
				'code' => 'PN',
				'name' => 'Pitcairn',
			),
			170 => 
			array (
				'id' => 171,
				'code' => 'PL',
				'name' => 'Poland',
			),
			171 => 
			array (
				'id' => 172,
				'code' => 'PT',
				'name' => 'Portugal',
			),
			172 => 
			array (
				'id' => 173,
				'code' => 'PR',
				'name' => 'Puerto Rico',
			),
			173 => 
			array (
				'id' => 174,
				'code' => 'QA',
				'name' => 'Qatar',
			),
			174 => 
			array (
				'id' => 175,
				'code' => 'RE',
				'name' => 'Reunion',
			),
			175 => 
			array (
				'id' => 176,
				'code' => 'RO',
				'name' => 'Romania',
			),
			176 => 
			array (
				'id' => 177,
				'code' => 'RU',
				'name' => 'Russian Federation',
			),
			177 => 
			array (
				'id' => 178,
				'code' => 'RW',
				'name' => 'Rwanda',
			),
			178 => 
			array (
				'id' => 179,
				'code' => 'KN',
				'name' => 'Saint Kitts and Nevis',
			),
			179 => 
			array (
				'id' => 180,
				'code' => 'LC',
				'name' => 'Saint Lucia',
			),
			180 => 
			array (
				'id' => 181,
				'code' => 'VC',
				'name' => 'Saint Vincent and the Grenadines',
			),
			181 => 
			array (
				'id' => 182,
				'code' => 'WS',
				'name' => 'Samoa',
			),
			182 => 
			array (
				'id' => 183,
				'code' => 'SM',
				'name' => 'San Marino',
			),
			183 => 
			array (
				'id' => 184,
				'code' => 'ST',
				'name' => 'Sao Tome and Principe',
			),
			184 => 
			array (
				'id' => 185,
				'code' => 'SA',
				'name' => 'Saudi Arabia',
			),
			185 => 
			array (
				'id' => 186,
				'code' => 'SN',
				'name' => 'Senegal',
			),
			186 => 
			array (
				'id' => 187,
				'code' => 'SC',
				'name' => 'Seychelles',
			),
			187 => 
			array (
				'id' => 188,
				'code' => 'SL',
				'name' => 'Sierra Leone',
			),
			188 => 
			array (
				'id' => 189,
				'code' => 'SG',
				'name' => 'Singapore',
			),
			189 => 
			array (
				'id' => 190,
				'code' => 'SK',
				'name' => 'Slovakia',
			),
			190 => 
			array (
				'id' => 191,
				'code' => 'SI',
				'name' => 'Slovenia',
			),
			191 => 
			array (
				'id' => 192,
				'code' => 'SB',
				'name' => 'Solomon Islands',
			),
			192 => 
			array (
				'id' => 193,
				'code' => 'SO',
				'name' => 'Somalia',
			),
			193 => 
			array (
				'id' => 194,
				'code' => 'ZA',
				'name' => 'South Africa',
			),
			194 => 
			array (
				'id' => 195,
				'code' => 'GS',
				'name' => 'South Georgia South Sandwich Islands',
			),
			195 => 
			array (
				'id' => 196,
				'code' => 'ES',
				'name' => 'Spain',
			),
			196 => 
			array (
				'id' => 197,
				'code' => 'LK',
				'name' => 'Sri Lanka',
			),
			197 => 
			array (
				'id' => 198,
				'code' => 'SH',
				'name' => 'St. Helena',
			),
			198 => 
			array (
				'id' => 199,
				'code' => 'PM',
				'name' => 'St. Pierre and Miquelon',
			),
			199 => 
			array (
				'id' => 200,
				'code' => 'SD',
				'name' => 'Sudan',
			),
			200 => 
			array (
				'id' => 201,
				'code' => 'SR',
				'name' => 'Suriname',
			),
			201 => 
			array (
				'id' => 202,
				'code' => 'SJ',
				'name' => 'Svalbarn and Jan Mayen Islands',
			),
			202 => 
			array (
				'id' => 203,
				'code' => 'SZ',
				'name' => 'Swaziland',
			),
			203 => 
			array (
				'id' => 204,
				'code' => 'SE',
				'name' => 'Sweden',
			),
			204 => 
			array (
				'id' => 205,
				'code' => 'CH',
				'name' => 'Switzerland',
			),
			205 => 
			array (
				'id' => 206,
				'code' => 'SY',
				'name' => 'Syrian Arab Republic',
			),
			206 => 
			array (
				'id' => 207,
				'code' => 'TW',
				'name' => 'Taiwan',
			),
			207 => 
			array (
				'id' => 208,
				'code' => 'TJ',
				'name' => 'Tajikistan',
			),
			208 => 
			array (
				'id' => 209,
				'code' => 'TZ',
				'name' => 'Tanzania, United Republic of',
			),
			209 => 
			array (
				'id' => 210,
				'code' => 'TH',
				'name' => 'Thailand',
			),
			210 => 
			array (
				'id' => 211,
				'code' => 'TG',
				'name' => 'Togo',
			),
			211 => 
			array (
				'id' => 212,
				'code' => 'TK',
				'name' => 'Tokelau',
			),
			212 => 
			array (
				'id' => 213,
				'code' => 'TO',
				'name' => 'Tonga',
			),
			213 => 
			array (
				'id' => 214,
				'code' => 'TT',
				'name' => 'Trinidad and Tobago',
			),
			214 => 
			array (
				'id' => 215,
				'code' => 'TN',
				'name' => 'Tunisia',
			),
			215 => 
			array (
				'id' => 216,
				'code' => 'TR',
				'name' => 'Turkey',
			),
			216 => 
			array (
				'id' => 217,
				'code' => 'TM',
				'name' => 'Turkmenistan',
			),
			217 => 
			array (
				'id' => 218,
				'code' => 'TC',
				'name' => 'Turks and Caicos Islands',
			),
			218 => 
			array (
				'id' => 219,
				'code' => 'TV',
				'name' => 'Tuvalu',
			),
			219 => 
			array (
				'id' => 220,
				'code' => 'UG',
				'name' => 'Uganda',
			),
			220 => 
			array (
				'id' => 221,
				'code' => 'UA',
				'name' => 'Ukraine',
			),
			221 => 
			array (
				'id' => 222,
				'code' => 'AE',
				'name' => 'United Arab Emirates',
			),
			222 => 
			array (
				'id' => 223,
				'code' => 'GB',
				'name' => 'United Kingdom',
			),
			223 => 
			array (
				'id' => 224,
				'code' => 'UM',
				'name' => 'United States minor outlying islands',
			),
			224 => 
			array (
				'id' => 225,
				'code' => 'UY',
				'name' => 'Uruguay',
			),
			225 => 
			array (
				'id' => 226,
				'code' => 'UZ',
				'name' => 'Uzbekistan',
			),
			226 => 
			array (
				'id' => 227,
				'code' => 'VU',
				'name' => 'Vanuatu',
			),
			227 => 
			array (
				'id' => 228,
				'code' => 'VA',
				'name' => 'Vatican City State',
			),
			228 => 
			array (
				'id' => 229,
				'code' => 'VE',
				'name' => 'Venezuela',
			),
			229 => 
			array (
				'id' => 230,
				'code' => 'VN',
				'name' => 'Vietnam',
			),
			230 => 
			array (
				'id' => 231,
				'code' => 'VG',
			'name' => 'Virigan Islands (British)',
			),
			231 => 
			array (
				'id' => 232,
				'code' => 'VI',
			'name' => 'Virgin Islands (U.S.)',
			),
			232 => 
			array (
				'id' => 233,
				'code' => 'WF',
				'name' => 'Wallis and Futuna Islands',
			),
			233 => 
			array (
				'id' => 234,
				'code' => 'EH',
				'name' => 'Western Sahara',
			),
			234 => 
			array (
				'id' => 235,
				'code' => 'YE',
				'name' => 'Yemen',
			),
			235 => 
			array (
				'id' => 236,
				'code' => 'YU',
				'name' => 'Yugoslavia',
			),
			236 => 
			array (
				'id' => 237,
				'code' => 'ZR',
				'name' => 'Zaire',
			),
			237 => 
			array (
				'id' => 238,
				'code' => 'ZM',
				'name' => 'Zambia',
			),
			238 => 
			array (
				'id' => 239,
				'code' => 'ZW',
				'name' => 'Zimbabwe',
			),
		));
	}

}
