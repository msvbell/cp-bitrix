<?php
 namespace Respect\Validation\Rules; use Respect\Validation\Exceptions\ComponentException; class LanguageCode extends AbstractRule { const ALPHA2 = 'alpha-2'; const ALPHA3 = 'alpha-3'; protected $languageCodeList = [ ['AA', '﻿AAR'], ['AB', 'ABK'], ['', 'ACE'], ['', 'ACH'], ['', 'ADA'], ['', 'ADY'], ['', 'AFA'], ['', 'AFH'], ['AF', 'AFR'], ['', 'AIN'], ['AK', 'AKA'], ['', 'AKK'], ['SQ', 'ALB'], ['', 'ALE'], ['', 'ALG'], ['', 'ALT'], ['AM', 'AMH'], ['', 'ANG'], ['', 'ANP'], ['', 'APA'], ['AR', 'ARA'], ['', 'ARC'], ['AN', 'ARG'], ['HY', 'ARM'], ['', 'ARN'], ['', 'ARP'], ['', 'ART'], ['', 'ARW'], ['AS', 'ASM'], ['', 'AST'], ['', 'ATH'], ['', 'AUS'], ['AV', 'AVA'], ['AE', 'AVE'], ['', 'AWA'], ['AY', 'AYM'], ['AZ', 'AZE'], ['', 'BAD'], ['', 'BAI'], ['BA', 'BAK'], ['', 'BAL'], ['BM', 'BAM'], ['', 'BAN'], ['EU', 'BAQ'], ['', 'BAS'], ['', 'BAT'], ['', 'BEJ'], ['BE', 'BEL'], ['', 'BEM'], ['BN', 'BEN'], ['', 'BER'], ['', 'BHO'], ['BH', 'BIH'], ['', 'BIK'], ['', 'BIN'], ['BI', 'BIS'], ['', 'BLA'], ['', 'BNT'], ['BS', 'BOS'], ['', 'BRA'], ['BR', 'BRE'], ['', 'BTK'], ['', 'BUA'], ['', 'BUG'], ['BG', 'BUL'], ['MY', 'BUR'], ['', 'BYN'], ['', 'CAD'], ['', 'CAI'], ['', 'CAR'], ['CA', 'CAT'], ['', 'CAU'], ['', 'CEB'], ['', 'CEL'], ['CH', 'CHA'], ['', 'CHB'], ['CE', 'CHE'], ['', 'CHG'], ['ZH', 'CHI'], ['', 'CHK'], ['', 'CHM'], ['', 'CHN'], ['', 'CHO'], ['', 'CHP'], ['', 'CHR'], ['CU', 'CHU'], ['CV', 'CHV'], ['', 'CHY'], ['', 'CMC'], ['', 'COP'], ['KW', 'COR'], ['CO', 'COS'], ['', 'CPE'], ['', 'CPF'], ['', 'CPP'], ['CR', 'CRE'], ['', 'CRH'], ['', 'CRP'], ['', 'CSB'], ['', 'CUS'], ['CS', 'CZE'], ['', 'DAK'], ['DA', 'DAN'], ['', 'DAR'], ['', 'DAY'], ['', 'DEL'], ['', 'DEN'], ['', 'DGR'], ['', 'DIN'], ['DV', 'DIV'], ['', 'DOI'], ['', 'DRA'], ['', 'DSB'], ['', 'DUA'], ['', 'DUM'], ['NL', 'DUT'], ['', 'DYU'], ['DZ', 'DZO'], ['', 'EFI'], ['', 'EGY'], ['', 'EKA'], ['', 'ELX'], ['EN', 'ENG'], ['', 'ENM'], ['EO', 'EPO'], ['ET', 'EST'], ['EE', 'EWE'], ['', 'EWO'], ['', 'FAN'], ['FO', 'FAO'], ['', 'FAT'], ['FJ', 'FIJ'], ['', 'FIL'], ['FI', 'FIN'], ['', 'FIU'], ['', 'FON'], ['FR', 'FRE'], ['', 'FRM'], ['', 'FRO'], ['', 'FRR'], ['', 'FRS'], ['FY', 'FRY'], ['FF', 'FUL'], ['', 'FUR'], ['', 'GAA'], ['', 'GAY'], ['', 'GBA'], ['', 'GEM'], ['KA', 'GEO'], ['DE', 'GER'], ['', 'GEZ'], ['', 'GIL'], ['GD', 'GLA'], ['GA', 'GLE'], ['GL', 'GLG'], ['GV', 'GLV'], ['', 'GMH'], ['', 'GOH'], ['', 'GON'], ['', 'GOR'], ['', 'GOT'], ['', 'GRB'], ['', 'GRC'], ['EL', 'GRE'], ['GN', 'GRN'], ['', 'GSW'], ['GU', 'GUJ'], ['', 'GWI'], ['', 'HAI'], ['HT', 'HAT'], ['HA', 'HAU'], ['', 'HAW'], ['HE', 'HEB'], ['HZ', 'HER'], ['', 'HIL'], ['', 'HIM'], ['HI', 'HIN'], ['', 'HIT'], ['', 'HMN'], ['HO', 'HMO'], ['HR', 'HRV'], ['', 'HSB'], ['HU', 'HUN'], ['', 'HUP'], ['', 'IBA'], ['IG', 'IBO'], ['IS', 'ICE'], ['IO', 'IDO'], ['II', 'III'], ['', 'IJO'], ['IU', 'IKU'], ['IE', 'ILE'], ['', 'ILO'], ['IA', 'INA'], ['', 'INC'], ['ID', 'IND'], ['', 'INE'], ['', 'INH'], ['IK', 'IPK'], ['', 'IRA'], ['', 'IRO'], ['IT', 'ITA'], ['JV', 'JAV'], ['', 'JBO'], ['JA', 'JPN'], ['', 'JPR'], ['', 'JRB'], ['', 'KAA'], ['', 'KAB'], ['', 'KAC'], ['KL', 'KAL'], ['', 'KAM'], ['KN', 'KAN'], ['', 'KAR'], ['KS', 'KAS'], ['KR', 'KAU'], ['', 'KAW'], ['KK', 'KAZ'], ['', 'KBD'], ['', 'KHA'], ['', 'KHI'], ['KM', 'KHM'], ['', 'KHO'], ['KI', 'KIK'], ['RW', 'KIN'], ['KY', 'KIR'], ['', 'KMB'], ['', 'KOK'], ['KV', 'KOM'], ['KG', 'KON'], ['KO', 'KOR'], ['', 'KOS'], ['', 'KPE'], ['', 'KRC'], ['', 'KRL'], ['', 'KRO'], ['', 'KRU'], ['KJ', 'KUA'], ['', 'KUM'], ['KU', 'KUR'], ['', 'KUT'], ['', 'LAD'], ['', 'LAH'], ['', 'LAM'], ['LO', 'LAO'], ['LA', 'LAT'], ['LV', 'LAV'], ['', 'LEZ'], ['LI', 'LIM'], ['LN', 'LIN'], ['LT', 'LIT'], ['', 'LOL'], ['', 'LOZ'], ['LB', 'LTZ'], ['', 'LUA'], ['LU', 'LUB'], ['LG', 'LUG'], ['', 'LUI'], ['', 'LUN'], ['', 'LUO'], ['', 'LUS'], ['MK', 'MAC'], ['', 'MAD'], ['', 'MAG'], ['MH', 'MAH'], ['', 'MAI'], ['', 'MAK'], ['ML', 'MAL'], ['', 'MAN'], ['MI', 'MAO'], ['', 'MAP'], ['MR', 'MAR'], ['', 'MAS'], ['MS', 'MAY'], ['', 'MDF'], ['', 'MDR'], ['', 'MEN'], ['', 'MGA'], ['', 'MIC'], ['', 'MIN'], ['', 'MIS'], ['', 'MKH'], ['MG', 'MLG'], ['MT', 'MLT'], ['', 'MNC'], ['', 'MNI'], ['', 'MNO'], ['', 'MOH'], ['MN', 'MON'], ['', 'MOS'], ['', 'MUL'], ['', 'MUN'], ['', 'MUS'], ['', 'MWL'], ['', 'MWR'], ['', 'MYN'], ['', 'MYV'], ['', 'NAH'], ['', 'NAI'], ['', 'NAP'], ['NA', 'NAU'], ['NV', 'NAV'], ['NR', 'NBL'], ['ND', 'NDE'], ['NG', 'NDO'], ['', 'NDS'], ['NE', 'NEP'], ['', 'NEW'], ['', 'NIA'], ['', 'NIC'], ['', 'NIU'], ['NN', 'NNO'], ['NB', 'NOB'], ['', 'NOG'], ['', 'NON'], ['NO', 'NOR'], ['', 'NQO'], ['', 'NSO'], ['', 'NUB'], ['', 'NWC'], ['NY', 'NYA'], ['', 'NYM'], ['', 'NYN'], ['', 'NYO'], ['', 'NZI'], ['OC', 'OCI'], ['OJ', 'OJI'], ['OR', 'ORI'], ['OM', 'ORM'], ['', 'OSA'], ['OS', 'OSS'], ['', 'OTA'], ['', 'OTO'], ['', 'PAA'], ['', 'PAG'], ['', 'PAL'], ['', 'PAM'], ['PA', 'PAN'], ['', 'PAP'], ['', 'PAU'], ['', 'PEO'], ['FA', 'PER'], ['', 'PHI'], ['', 'PHN'], ['PI', 'PLI'], ['PL', 'POL'], ['', 'PON'], ['PT', 'POR'], ['', 'PRA'], ['', 'PRO'], ['PS', 'PUS'], ['', 'QAA-QTZ'], ['QU', 'QUE'], ['', 'RAJ'], ['', 'RAP'], ['', 'RAR'], ['', 'ROA'], ['RM', 'ROH'], ['', 'ROM'], ['RO', 'RUM'], ['RN', 'RUN'], ['', 'RUP'], ['RU', 'RUS'], ['', 'SAD'], ['SG', 'SAG'], ['', 'SAH'], ['', 'SAI'], ['', 'SAL'], ['', 'SAM'], ['SA', 'SAN'], ['', 'SAS'], ['', 'SAT'], ['', 'SCN'], ['', 'SCO'], ['', 'SEL'], ['', 'SEM'], ['', 'SGA'], ['', 'SGN'], ['', 'SHN'], ['', 'SID'], ['SI', 'SIN'], ['', 'SIO'], ['', 'SIT'], ['', 'SLA'], ['SK', 'SLO'], ['SL', 'SLV'], ['', 'SMA'], ['SE', 'SME'], ['', 'SMI'], ['', 'SMJ'], ['', 'SMN'], ['SM', 'SMO'], ['', 'SMS'], ['SN', 'SNA'], ['SD', 'SND'], ['', 'SNK'], ['', 'SOG'], ['SO', 'SOM'], ['', 'SON'], ['ST', 'SOT'], ['ES', 'SPA'], ['SC', 'SRD'], ['', 'SRN'], ['SR', 'SRP'], ['', 'SRR'], ['', 'SSA'], ['SS', 'SSW'], ['', 'SUK'], ['SU', 'SUN'], ['', 'SUS'], ['', 'SUX'], ['SW', 'SWA'], ['SV', 'SWE'], ['', 'SYC'], ['', 'SYR'], ['TY', 'TAH'], ['', 'TAI'], ['TA', 'TAM'], ['TT', 'TAT'], ['TE', 'TEL'], ['', 'TEM'], ['', 'TER'], ['', 'TET'], ['TG', 'TGK'], ['TL', 'TGL'], ['TH', 'THA'], ['BO', 'TIB'], ['', 'TIG'], ['TI', 'TIR'], ['', 'TIV'], ['', 'TKL'], ['', 'TLH'], ['', 'TLI'], ['', 'TMH'], ['', 'TOG'], ['TO', 'TON'], ['', 'TPI'], ['', 'TSI'], ['TN', 'TSN'], ['TS', 'TSO'], ['TK', 'TUK'], ['', 'TUM'], ['', 'TUP'], ['TR', 'TUR'], ['', 'TUT'], ['', 'TVL'], ['TW', 'TWI'], ['', 'TYV'], ['', 'UDM'], ['', 'UGA'], ['UG', 'UIG'], ['UK', 'UKR'], ['', 'UMB'], ['', 'UND'], ['UR', 'URD'], ['UZ', 'UZB'], ['', 'VAI'], ['VE', 'VEN'], ['VI', 'VIE'], ['VO', 'VOL'], ['', 'VOT'], ['', 'WAK'], ['', 'WAL'], ['', 'WAR'], ['', 'WAS'], ['CY', 'WEL'], ['', 'WEN'], ['WA', 'WLN'], ['WO', 'WOL'], ['', 'XAL'], ['XH', 'XHO'], ['', 'YAO'], ['', 'YAP'], ['YI', 'YID'], ['YO', 'YOR'], ['', 'YPK'], ['', 'ZAP'], ['', 'ZBL'], ['', 'ZEN'], ['', 'ZGH'], ['ZA', 'ZHA'], ['', 'ZND'], ['ZU', 'ZUL'], ['', 'ZUN'], ['', 'ZXX'], ['', 'ZZA'], ]; public $set; public $index; public function __construct($set = self::ALPHA2) { $index = array_search($set, self::getAvailableSets(), true); if (false === $index) { throw new ComponentException(sprintf('"%s" is not a valid language set for ISO 639', $set)); } $this->set = $set; $this->index = $index; } public static function getAvailableSets() { return [ self::ALPHA2, self::ALPHA3, ]; } private function getLanguageCodeList($index) { $languageList = []; foreach ($this->languageCodeList as $language) { $languageList[] = $language[$index]; } return $languageList; } public function validate($input) { if (!is_string($input) || '' === $input) { return false; } return in_array( strtoupper($input), $this->getLanguageCodeList($this->index), true ); } } 