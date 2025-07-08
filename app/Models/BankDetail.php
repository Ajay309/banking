<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
protected $fillable = ['user_name','account_number', 'ifsc_code', 'pdf_url', 'pdf_file'];
}
