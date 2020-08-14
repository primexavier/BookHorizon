<?php

namespace App\Imports;

use App\Model\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BookImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'author_id' => 1,
            'supplier_id' => 1,
            'title' => $row["title_of_the_book"],
            'isbn' => $row["isbn"],
            'publication_city' => $row["publication_city_country"],
            'format' => $row["format"],
            'pages' => $row["pages"],
            'weight' => $row["weight"],
            'dimension' => $row["dimension"],
            'purchase_price' => $row["purchase_price"],
            'start_qty' => $row["qty"],
            'purchase_date' => $row["purchase_date"],
            'vendor' => $row["vendor"],
        ]);
    }

    public function headingRow(): int
    {
        return 2;
    }
}
