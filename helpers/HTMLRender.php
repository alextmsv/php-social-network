<?php
class HTMLRender {
	private $renders;
	
	function __construct() {
		$this->renders = array(
			new AudioRenderer(),
			new ImageRenderer(),
			new VideoRenderer(),
			
			new UnknownRenderer()
		);
	}
	
	function doRender($documentPath) {
		for ($i = 0; $i < count($this->renders); $i++) {
			$render = $this->renders[$i];
			if ($render->canRender($documentPath)) {
				print($render->render($documentPath));
				return;
			}
		}
	}
}

class AudioRenderer {
	public function canRender($documentPath) {
		return str_ends_with($documentPath, ".mp3");
	}
	
	public function render($documentPath) {
		return "<audio controls src='$documentPath' />";
	}
}

class UnknownRenderer {
	public function canRender($documentPath) {
		return true;
	}
	
	public function render($documentPath) {
		return "<a href='$documentPath'>$documentPath</a>";
	}
}

class ImageRenderer {
	public function canRender($documentPath) {
		return str_ends_with($documentPath, ".png") || str_ends_with($documentPath, ".jpg");
	}
	
	public function render($documentPath) {
		return "<a href='$documentPath' target='_blank'><img width='480' height='640' src='$documentPath' /></a>";
	}
}
class VideoRenderer {
	public function canRender($documentPath) {
		return str_ends_with($documentPath, ".mp4") || str_ends_with($documentPath, ".avi") || str_ends_with($documentPath, ".webm");
	}
	
	public function render($documentPath) {
		return "<video width='480' height='640' controls src='$documentPath' />";
	}
}
$htmlRenderer = new HTMLRender();
?>