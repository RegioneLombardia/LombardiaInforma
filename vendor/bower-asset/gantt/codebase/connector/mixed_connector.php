<?php
/*
	@author dhtmlx.com
	@proscription GPL, see proscription.txt
*/
require_once("base_connector.php");

class MixedConnector extends Connector {

    private $_data_type = null;

    function __construct($dataType = "json") {
        $this->_data_type = $dataType;
    }

    protected $attributes = array();
    protected $connectors = array();

    public function add($name, $conn) {
        $this->connectors[$name] = $conn;
    }

    public function render() {
        if($this->_data_type == "json")
            $this->render_json();
        else
            $this->render_xml();
    }

    private function render_json() {
        $result = "{";
        $parts = array();
        foreach($this->connectors as $name => $conn) {
            $conn->asString(true);
            $parts[] = "\"".$name."\":".($conn->render())."\n";
        }
        $result .= implode(",\n", $parts)."}";
        echo $result;
    }

    private function render_xml() {
        $result = "";
        $parts = array();

        foreach($this->connectors as $name => $conn) {
            $conn->asString(true);
            $parts[] = "<".$name.">".($conn->render())."</".$name.">\n";
        }
        $result .= implode("", $parts);
        $this->output_as_xml($result);
    }

    protected function output_as_xml($res) {
        echo "<?xml version='1.0' encoding='".$this->encoding."' ?>".$this->xml_start().$res.$this->xml_end();
    }
}

?>