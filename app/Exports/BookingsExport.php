<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BookingsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Booking::all(); // Adjust this to fetch only the required data if needed
    }

    // Define the headings for the Excel sheet
    public function headings(): array
    {
        return [
            'Room ID',
            'Customer Name',
            'Email',
            'Phone',
            'Arrival Date',
            'Leaving Date',
            'Status',
            'Room Title',
            'Price',
            'Image',
        ];
    }

    // Map the data for each booking
    public function map($booking): array
    {
        return [
            $booking->room_id,
            $booking->name,
            $booking->email,
            $booking->phone,
            $booking->start_date,
            $booking->end_date,
            $booking->status,
            $booking->room->room_title, // Assuming 'room' relationship is defined
            $booking->room->price,
            $booking->room->image,
        ];
    }
}
