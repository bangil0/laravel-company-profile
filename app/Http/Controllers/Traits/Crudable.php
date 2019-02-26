<?php

namespace App\Http\Controllers\Traits;

trait Crudable
{
    public function flashSuccessCreate($message = 'Data berhasil disimpan')
    {
        $this->flash('success', $message);
    }
    
    public function flashSuccessUpdate($message = 'Data berhasil diupdate')
    {
        $this->flash('success', $message);
    }
    
    public function flashSuccessDelete($message = 'Data berhasil dihapus')
    {
        $this->flash('success', $message);
    }

    public function flash($key, $message)
    {
        session()->flash($key, $message);
    }
}
