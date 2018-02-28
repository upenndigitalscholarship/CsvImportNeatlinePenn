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
     * WARNING -- this function is not used in conversion, see Element.php
     */
    protected function _degrees_to_meters($point)
    {

      $point = str_replace(' ', '', $point);
      $values = explode(",", $point);
      $lat = $values[0];
      $lon = $values[1];
      $lat = log(tan((90 + $lat) * pi() / 360)) / (pi() / 180);

      $lon_new = $lon * 20037508.34 / 180;
      $lat_new = $lat * 20037508.34 / 180;

      $ret = "POINT($lon_new $lat_new)";
        // print $ret;
      return $ret;
    }
}
