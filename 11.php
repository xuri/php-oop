<?php
	class Conf {
		private $file;
		private $xml;
		private $lastmatch;

		function __construct($file){
			$this->file = $file;
			if(!file_exists($file)){
				throw new Exception("file '$file' does not exist");
			}
			// $this->xml = simplexml_load_file($file);

			$this->xml = simplexml_load_file($file, null, LIBXMAL_NOERROR);
			if(!is_object($this->xml)){
				throw new XmlException(libxml_get_last_error());
			}
			print gettype($this->xml);
			$matches = $this->xml->xpath("/conf");
			if(!count($matches)){
				throw new FileException("could not find root element: conf");
			}

			// try{
			// 	$conf = new Conf( dirname(__FILE__)."/conf01.xml");
			// 	print "user: ".$conf->get('user')."\n";
			// 	print "host: ".$count->get('host')."\n";
			// 	$conf->set("pass", "newpass");
			// 	$conf->write();
			// } catch (Exception $e){
			// 	die($e->__toString());
			// }
		}

		function write(){
			if($is_writeable($this->file)){
				throw new Exception("file '$file->file' is not writeable!");
			}
			file_put_contents($thos->file, $this->xml->asXML());
		}

		function get($str){
			$matches = $this->xml->xpath("/conf/item[@name=\"$str\"]");
			if(count($matches)){
				$this->lastmatch = $matches[0];
				return (string)$matches[0];
			}
			return null;
		}

		function set($key, $value){
			if(!is_null($this->get($key))){
				$this->lastmatch[0] = $value;
				return;
			}
			$conf = $this->xml->conf;
			$this->xml->addChild('item', $value)->addAttribute('name', $key);
		}

	}

	class XmlException extends Exception{
		private $error;

		function __construct(LibXmlError $error){
			$shortfile = basename($error->file);
			$msg = "[{$shortfile}, line {$error->line}, col{$eror->column}]{$error->message}";
			$this->error = $error;
			parent::__construct($msg, $error->code);
		}

		function getLibXmlError(){
			return $this->error;
		}

	}

	class FileException extends Exception{}

	class ConfException extends Exception{}
?>