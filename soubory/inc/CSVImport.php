<?php 
class CSVImport
{
    private $fp;
    private $parse_header;
    private $header;
    private $delimiter;
    private $length;
    private $lines = 0;
    private $data = array();

    //--------------------------------------------------------------------
    function __construct($file_name, $parse_header=false, $delimiter="\t", $length = 8000)
    {
        $this->fp = fopen($file_name, "r");
        $this->parse_header = $parse_header;
        $this->delimiter = $delimiter;
        $this->length = $length;

        if ($this->parse_header)
        {
           $this->header = fgetcsv($this->fp, $this->length, $this->delimiter);
        }

        while ($row = fgetcsv($this->fp, $this->length, $this->delimiter))
        {
            if ($this->parse_header)
            {
                foreach ($this->header as $i => $heading)
                {
                    $row_new[$heading] = $row[$i];
                }
                $this->data[] = $row_new;
            }
            else
            {
                $this->data[] = $row;
            }
            $this->lines++;
        }
    }

    //--------------------------------------------------------------------
    function __destruct()
    {
        if ($this->fp)
        {
            fclose($this->fp);
        }
    }
    //--------------------------------------------------------------------
    function getData()
    {
        return $this->data;
    }
    //--------------------------------------------------------------------
    function getTable($columns='all',$class = "table")
    {
        $output = "<table class=\"".$class."\">";
        if ($this->header) {
        	$output .= "<thead><tr>";
        	foreach ($this->header as $value) 
        	{
        		$output .= "<th>".$value."</th>";
        	}
        	$output .= "</tr></thead>";
        }
        if ($this->lines > 0) {
        	$output .= "<tbody>";
        	foreach ($this->data as $row) 
        	{
        		$output .= "<tr>";
        		foreach ($row as $value) 
        		{
        			$output .= "<td>".$value."</td>";
        		}
        		$output .= "</tr>";
        	}
        	$output .= "</tbody>";        	
        }
        $output .= "</table>";
        return $output;
    }
    //--------------------------------------------------------------------

} 