<?php
class Messages{
	public static function setMsg($text, $type){
		if($type == 'error'){
			$_SESSION['errorMsg'] = $text;
		} else {
			$_SESSION['successMsg'] = $text;
		}
	}

	public static function display(){
		if(isset($_SESSION['errorMsg'])){
			echo '<div class="alert alert-danger">
			<div class="container-fluid">
				<div class="alert-icon">
					<i class="material-icons">info_outline</i>
				</div>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"><i class="material-icons">clear</i></span>
				</button>

				<b>Info alert:</b> '.$_SESSION['errorMsg'].'
			</div>
		</div>';

			unset($_SESSION['errorMsg']);
			
		}

		if(isset($_SESSION['successMsg'])){
			echo '<div class="alert alert-success">
			<div class="container-fluid">
				<div class="alert-icon">
					<i class="material-icons">info_outline</i>
				</div>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"><i class="material-icons">clear</i></span>
				</button>

				<b>Info alert:</b> '.$_SESSION['successMsg'].'
			</div>
		</div>';
			unset($_SESSION['successMsg']);
		}
	}
}