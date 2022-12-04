                    <li class="list-group-item text-capitalize">
                        <strong class="">Name: </strong> {{$user['fname']}} {{$user['lname']}} 
                    </li>
                    <li class="list-group-item ">
                        <strong class="">Contact: </strong> {{$user['contact']}} 
                    </li>
                    <li class="list-group-item ">
                        <strong class="">Email: </strong> {{$user['email']}} 
                    </li>
                    @if(!$isDoctor)
                    <li class="list-group-item ">
                        <strong class="">Address: </strong> {{$user['address']}}
                    </li>
                    @endif