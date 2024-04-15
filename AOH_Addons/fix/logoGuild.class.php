<?
if (basename($_SERVER["REQUEST_URI"]) === basename(__FILE__))
{
	exit();
}

class guildLogo
{
	var $SuperCuadrilla = array();

	function logoColor($mark)
	{
		if (substr_count($mark, 0) >= 1)
		{
			return "#FFFFFF";
		}
		if (substr_count($mark, 1) >= 1)
		{
			return "#000000";
		}
		if (substr_count($mark, 2) >= 1)
		{
			return "#8C8A8D";
		}
		if (substr_count($mark, 3) >= 1)
		{
			return "#FFFFFF";
		}
		if (substr_count($mark, 4) >= 1)
		{
			return "#FE0000";
		}
		if (substr_count($mark, 5) >= 1)
		{
			return "#FF8A00";
		}
		if (substr_count($mark, 6) >= 1)
		{
			return "#FFFF00";
		}
		if (substr_count($mark, 7) >= 1)
		{
			return "#8CFF01";
		}
		if (substr_count($mark, 8) >= 1)
		{
			return "#00FF00";
		}
		if (substr_count($mark, 9) >= 1)
		{
			return "#01FF8D";
		}
		if (substr_count($mark, "A") >= 1)
		{
			return "#FFFF00";
		}
		if (substr_count($mark, "B") >= 1)
		{
			return "#008AFF";
		}
		if (substr_count($mark, "C") >= 1)
		{
			return "#0000FE";
		}
		if (substr_count($mark, "D") >= 1)
		{
			return "#8C00FF";
		}
		if (substr_count($mark, "E") >= 1)
		{
			return "#FF00FE";
		}
		if (substr_count($mark, "F") >= 1)
		{
			return "#FF008C";
		}
	}

	function Load($hex, $size = 100)
	{
		$pixelSize = $size / 8;
		for ($y = 0; $y < 8; $y++)
		{
			for ($x = 0; $x < 8; $x++)
			{
				$offset = ($y * 8) + $x;
				$Cuadrilla8x8[$y][$x] = substr($hex, $offset, 1);
			}
		}

		for ($y = 1; $y <= 8; $y++)
		{
			for ($x = 1; $x <= 8; $x++)
			{
				$bit = $Cuadrilla8x8[$y - 1][$x - 1];
				for ($repiteY = 0; $repiteY < $pixelSize; $repiteY++)
				{
					for ($repite = 0; $repite < $pixelSize; $repite++)
					{
						$translatedY = ((($y - 1) * $pixelSize) + $repiteY);
						$translatedX = ((($x - 1) * $pixelSize) + $repite);
						$this->SuperCuadrilla[$translatedY][$translatedX] = $bit;
					}
				}
			}
		}

		$img = imagecreate($size, $size);
		for ($y = 0; $y < $size; $y++)
		{
			for ($x = 0; $x < $size; $x++)
			{
				$bit = strtoupper($this->SuperCuadrilla[$y][$x]);
				$color = substr($this->logoColor($bit), 1);
				$r = substr($color, 0, 2);
				$g = substr($color, 2, 2);
				$b = substr($color, 4, 2);
				$superPixel = imagecreate(1, 1);
				$cl = imagecolorallocatealpha($superPixel, hexdec($r), hexdec($g), hexdec($b), 0);
				imagefilledrectangle($superPixel, 0, 0, 1, 1, $cl);
				imagecopy($img, $superPixel, $x, $y, 0, 0, 1, 1);
				imagedestroy($superPixel);
			}
		}

		header("Content-type: image/png");
		imagepng($img);
	}
}
?>