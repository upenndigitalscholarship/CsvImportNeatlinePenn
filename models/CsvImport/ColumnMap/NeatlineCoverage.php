<?php
/**
 * CsvImport_ColumnMap_NeatlineCoverage class
 *
 * @package CsvImport
 * @Created by Haoran Shao for Penn museum library
 */
class CsvImport_ColumnMap_NeatlineCoverage extends CsvImport_ColumnMap 
{    
    /**
     * @param string $columnName
     */
    public function __construct($columnName)
    {
        parent::__construct($columnName);
        $this->_type = CsvImport_ColumnMap::TYPE_NEATLINE;
    }

    /**
     * Map a row to an array that can be parsed by
     * insert_item() or insert_files_for_item().
     *
     * @param array $row The row to map
     * @param array $result
     * @return array The result
     */
    public function map($row, $result)
    {
        $result = null;
        $point = $row[$this->_columnName];
        if ($point != '') {
            $point_converted = $this->_degrees_to_meters($point);
            if ($point_converted) {
                $result = $point_converted;
            }
        }
        return $result;
    }
    
    /**
     * Return a collection by its title
     *degrees_to_meters
     * @param string $name The collection name
     * @return Collection The collection
     */    
    protected function _degrees_to_meters($point)
    {
        $values_pair = substr($point, 6, -1);
        $values = explode(" ", $values_pair);
        $lat = values[0];
        $lon = values[1];
        $lat_new = Math.log(Math.tan((90 + $lat) * Math::PI / 360)) / (Math::PI / 180);
        
        $lon_new = $lon * 20037508.34 / 180;
        $ret = "$lat_new $lon_new";  
        return $ret;
    }
}
