<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8|7 Datatables Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    {{-- <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    {{-- for button visibility column --}}
     {{-- <link href="https://cdn.datatables.net/buttons/1.5.6/dataTables.buttons.min.css" rel="stylesheet"> --}}

</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Laravel 7|8 Yajra Datatables Example</h2>
    <table class="table table-bordered yajra-datatable">

         Filter:
         <select name="filter-date" id="">filter-date>
         <option value="">last 2 day</option>
         <option value="">last 4 day</option>
         <option value="">last 6 day</option>
         <option value="">last 8</option>
         </select>


        <thead>
            <tr>
                <th>id</th>
                <th>firstName</th>
                <th>lastname</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- filtercolumn means search column --}}
           <tfoot>
           <tr>
         <td><input type="number" class="form-Controll filter-input"placeholder="Enter for id" data-column="0 " ></td>
         <td><input type="text" class="form-Controll filter-input" placeholder="Enter for firstname" data-column="1" ></td>
         <td><input type="text" class="form-Controll filter-input"placeholder="Enter for lastname" data-column="2" ></td>
         <td> <input type="email" class="form-Controll filter-input"placeholder="Enter for email" data-column="3 " ></td>
           </tr>

           {{-- dd filtercolumn   --}}

           <tr>
           <td>
            <select data-column="0" class="form-control select">
                <option value="">select id</option>
                @foreach ($data as $row)
                    <option value="{{$row->id}}">{{$row->id}}</option>
                @endforeach
            </select>
        </td>
        <td>
            <select data-column="1" class="form-control select">
                <option value="">select Firstname</option>
                @foreach ($data as $row)
                    <option value="{{$row->firstname}}">{{$row->firstname}}</option>
                @endforeach
            </select>
        </td>
        <td>
            <select data-column="2" class="form-control select">
                <option value="">select Lastname</option>
                @foreach ($data as $row)
                    <option value="{{$row->lastname}}">{{$row->lastname}}</option>
                @endforeach
            </select>
        </td>
        <td>
            <select data-column="3" class="form-control select">
                <option value="">select Email</option>
                @foreach ($data as $row)
                    <option value="{{$row->email}}">{{$row->email}}</option>
                @endforeach
            </select>
        </td>
           </tr>
          </tfoot>
        </tbody>
    </table>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
{{-- // for button column visibility --}}
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

<script type="text/javascript">
  $(function () {

    var table = $('.yajra-datatable').DataTable({
        language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/mr.json',
    },
        processing: true,
        serverSide: true,
        ajax: "{{ route('create.list') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'firstname', name: 'firstname'},
            {data: 'lastname', name: 'lastname'},
            {data: 'email', name: 'email'},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            }
        ],
        // visible button
             buttons: [
                {
                    extend: 'colvis',
                    text: 'Column Visibility'
                }
            ],
            dom: 'lfrtipB',

            // join the column firstname and lastname

        //     columnDefs: [
        //         {
        //             render: function(data, type, row){
        //                 return data+' '+row['lastname'];
        //             },
        //             targets: 1
        //         },
        //         {
        //             visible: false,
        //             targets: 2
        //         }
        //    ],


            // order ascending
            order:[
                [1,'asc']

            ],

            // pagelenght and pagination
            // pageLength:3,
            // lengthMenu:[2,4,6]



    });

    // filter search column
    $('.filter-input').keyup(function (){
            table.column($(this).data('column')).search($(this).val()).draw();
    });
            // dd filter column
            $('.select').change(function (){
            table.column($(this).data('column')).search($(this).val()).draw();

        });
  });
  </script>
</html>
