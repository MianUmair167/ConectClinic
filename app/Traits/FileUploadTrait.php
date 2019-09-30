<?php


namespace App\Traits;


use App\Models\FileUpload;
use Illuminate\Database\Eloquent\Builder;

trait FileUploadTrait
{
    /**
     * Perform insert
     * @param Builder $query
     * @return bool
     */
    public function performInsert(Builder $query)
    {
        $insertPerformed = parent::performInsert($query);
        if(!$insertPerformed) {
            return $insertPerformed;
        }

        $request = request();
        $tableTempId = $request->get('table_temp_id');

        FileUpload::where('table_temp_id', $tableTempId)
            ->where('table', $this->getTable())
            ->update([
                'table_id' => $this->id,
            ]);

        return $insertPerformed;
    }
}