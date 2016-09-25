<html>
	<head>
	<title>
		URL Shortner
	</title>
		<style>
			#form-div{
				  background: -webkit-linear-gradient(bottom, #CCCCCC, #EEEEEE 175px);
				  margin: auto;
				  position: relative;
				  width: 550px;
				  font-family: Tahoma, Geneva, sans-serif;
				  font-size: 14px;
				  line-height: 24px;
				  font-weight: bold;
				  text-decoration: none;
				  border-radius: 10px;
				  padding: 20px;
				  border: 1px solid #999;
				}
			.input_box{
				width:100%;
				height:30px;
				border-radius: 10px;
				border: 1px solid #999;
				padding:10px;
			}
			.submit{
				width:100px;
				height:30px;
				margin-top:30px;
				border-radius: 10px;
				background-color:#aaa;
				font-family: Tahoma, Geneva, sans-serif;
				font-size: 14px;
				font-weight:bold;
			}
		</style>
	</head>
	<body>
		<div id="form-div">
			<?php
			    echo validation_errors(); 
				
				echo form_open('url_shortner/submit');
				
				echo "<h2>";
				echo form_label('Full URL :', 'f_url');
				echo "</h2>";
				$data= array(
					'name' => 'f_url',
					'placeholder' => 'Please Enter your full URL as http://...',
					'class' => 'input_box',
					'required' => 'required',
					'pattern'=>'http?://.+'
				);
				echo form_input($data);
				
			?>
			<div >
				<?php
					$data = array(
					'type' => 'submit',
					'value'=> 'Submit',
					'class'=> 'submit'
					);
					echo form_submit($data); 
				?>
			</div>
			<?php
				echo form_close();
			?>
		
		
			<?php 
				if(isset($s_url)){
					?>
					<h3> Your short URL </h3>
					<h4> <?php echo $s_url; ?> </h4>
					<?php
				}
			?>
		</div>
	</body>
</html>