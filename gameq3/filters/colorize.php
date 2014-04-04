<?php
/**
 * This file is part of GameQ3.
 *
 * GameQ3 is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * GameQ3 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 */
 
namespace GameQ3\filters;
 
class Colorize {
 
	// todo: add html support
	public static function filter($protocol_filterparams, &$data, $args) {
		if (!isset($args['format']) || $args['format'] !== 'strip')
			return;

		if (isset($protocol_filterparams['strip']) && is_callable($protocol_filterparams['strip'])) {
			$cb = $protocol_filterparams['strip'];
			array_walk_recursive($data, function(&$val) use ($cb) {
				if (is_string($val))
					$val = $cb($val);
			});
		}
	}

	/*
	
	PORTION OF BAD-FORMATTED SHITCODE
	
  function lgsl_parse_color($string, $type)
  {
    switch($type)
    {
      case "1":
        $string = preg_replace("/\^x.../", "", $string);
        $string = preg_replace("/\^./",    "", $string);

        $string_length = strlen($string);
        for ($i=0; $i<$string_length; $i++)
        {
          $char = ord($string[$i]);
          if ($char > 160) { $char = $char - 128; }
          if ($char > 126) { $char = 46; }
          if ($char == 16) { $char = 91; }
          if ($char == 17) { $char = 93; }
          if ($char  < 32) { $char = 46; }
          $string[$i] = chr($char);
        }
      break;

      case "2":
        $string = preg_replace("/\^[\x20-\x7E]/", "", $string);
      break;

      case "doomskulltag":
        $string = preg_replace("/\\x1c./", "", $string);
      break;

      case "farcry":
        $string = preg_replace("/\\$\d/", "", $string);
      break;

      case "painkiller":
        $string = preg_replace("/#./", "", $string);
      break;

      case "quakeworld":
        $string_length = strlen($string);
        for ($i=0; $i<$string_length; $i++)
        {
          $char = ord($string[$i]);
          if ($char > 141) { $char = $char - 128; }
          if ($char < 32)  { $char = $char + 30;  }
          $string[$i] = chr($char);
        }
      break;

      case "savage":
        $string = preg_replace("/\^[a-z]/",   "", $string);
        $string = preg_replace("/\^[0-9]+/",  "", $string);
        $string = preg_replace("/lan .*\^/U", "", $string);
        $string = preg_replace("/con .*\^/U", "", $string);
      break;

      case "swat4":
        $string = preg_replace("/\[c=......\]/Usi", "", $string);
      break;
    }
    return $string;
  }
	
	*/
}