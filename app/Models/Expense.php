<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'amount',
        'detail',
        'expense_category_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * expenseCategory
     *
     * @return BelongsTo
     */
    public function expenseCategory(): BelongsTo
    {
        return $this->belongsTo(
            ExpenseCategory::class,
            'expense_category_id',
            'id',
        );
    }

}
