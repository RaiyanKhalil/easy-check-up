
<table class="table">
    <tr>
        <th>
            Booking ID
        </th>
        @if ($isDoctor)
            <th>
                Patient
            </th>
        @else
            <th>
                Doctor
            </th>
        @endif
        <th>
            Date
        </th>
        <th>
            Time Start
        </th>
        <th>
            Time End
        </th>
        <th>
            Status
        </th>
        <th colspan="2">
            Actions
        </th>
    </tr>
    @foreach($appts as $a)
    <tr>
        <td>
            {{ $a->id }}
        </td>
        @if($isDoctor)
            <td>
                <span class="text-capitalize">{{ $a->patient->fname }} {{ $a->patient->lname }}</span>
            </td>
        @else
            <td>
                <span class="text-capitalize"> Dr {{ $a->doctor->f_name }} {{ $a->doctor->l_name }}</span>
            </td>
        @endif
        <td>
            {{ date_format(date_create($a->datetime_start), 'M d, Y') }}
        </td>
        <td>
            {{ date_format(date_create($a->datetime_start), 'h:i A') }}
        </td>
        <td>
            {{ date_format(date_create($a->datetime_end), 'h:i A') }}
        </td>
        <td>
            @switch($a->status_id)
                @case(2)
                    <span class="text-success">Approved</span>
                    @break
            
                @case(3)
                    <span class="text-muted">Cancelled</span>
                    @break
            
                @default
                    <span class="text-primary">Pending</span>
            @endswitch
        </td>
        <td>
            <a class="text-warning" href={{'/appointment/delete/' . $a->id}}>Edit</a>
        </td>
        <td>
            @if($a->status_id == 3)
                <a class="text-danger" href={{ route('appointment-delete', $a->id)  }}>Delete</a>
            @else
                <a class="text-danger" href={{ route('appointment-cancel', $a->id)  }}>Cancel</a>
            @endif
            
        </td>
    </tr>
@endforeach
</table>


    