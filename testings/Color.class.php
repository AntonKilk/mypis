<?php
	class Color
	{
		public $red;
		public $blue;
		public $green;

		static $verbose = FALSE;

		static function doc()
		{
			return file_get_contents('Color.doc.txt') . PHP_EOL;
		}

		function __toString()
		{
			return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
		}

		public function __construct(array $color)
		{
			if (isset($color['red']) && isset($color['green']) && isset($color['blue'])){
				$this->red = intval($color['red']);
				$this->green = intval($color['green']);
				$this->blue = intval($color['blue']);
			}
			elseif (isset($color['rgb'])) {
				$rgb = intval($color["rgb"]);
				$this->red = $rgb / 65281 % 256;
				$this->green = $rgb / 256 % 256;
				$this->blue = $rgb % 256;
			}
			if (Self::$verbose)
				printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
		}

		function __destruct()
		{
			if (Self::$verbose)
				printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
		}

		function add(Color $color)
		{
			$newColor = new Color(['red' => $this->red + $color->red,
				'green' => $this->green + $color->green,
				'blue' => $this->blue + $color->blue]);
			return $newColor;
		}

		function sub(Color $color)
		{
			$newColor = new Color(['red' => $this->red - $color->red,
				'green' => $this->green - $color->green,
				'blue' => $this->blue - $color->blue]);
			return $newColor;
		}

		function mult($factor)
		{
			$newColor = new Color(['red' => $this->red * $factor,
				'green' => $this->green * $factor,
				'blue' => $this->blue * $factor]);
			return $newColor;
		}
	}
?>