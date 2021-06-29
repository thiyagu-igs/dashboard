<?php namespace App;

class BaseModel extends Model {

    /**
     * Return a timestamp as DateTime object.
     *
     * Extended to allow saving empty date values as NULL in the database.
     *
     * @param  mixed $value
     *
     * @return \Carbon\Carbon
     */
    protected function asDateTime($value) {
        if(empty($value)) {
            return null;
        }

        return parent::asDateTime($value);
    }

}
?>