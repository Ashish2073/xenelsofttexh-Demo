<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}


        </h2>
    </x-slot>


    <style>
        body {
            background-color: #e6e6e6;
            width: 100%;
            height: 100%;
        }

        #success_tic .page-body {
            max-width: 300px;
            background-color: #FFFFFF;
            margin: 10% auto;
        }

        #success_tic .page-body .head {
            text-align: center;
        }

        /* #success_tic .tic{
  font-size:186px;
} */
        #success_tic .close {
            opacity: 1;
            position: absolute;
            right: 0px;
            font-size: 30px;
            padding: 3px 15px;
            margin-bottom: 10px;
        }

        #success_tic .checkmark-circle {
            width: 150px;
            height: 150px;
            position: relative;
            display: inline-block;
            vertical-align: top;
        }

        .checkmark-circle .background {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: #1ab394;
            position: absolute;
        }

        #success_tic .checkmark-circle .checkmark {
            border-radius: 5px;
        }

        #success_tic .checkmark-circle .checkmark.draw:after {
            -webkit-animation-delay: 300ms;
            -moz-animation-delay: 300ms;
            animation-delay: 300ms;
            -webkit-animation-duration: 1s;
            -moz-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-timing-function: ease;
            -moz-animation-timing-function: ease;
            animation-timing-function: ease;
            -webkit-animation-name: checkmark;
            -moz-animation-name: checkmark;
            animation-name: checkmark;
            -webkit-transform: scaleX(-1) rotate(135deg);
            -moz-transform: scaleX(-1) rotate(135deg);
            -ms-transform: scaleX(-1) rotate(135deg);
            -o-transform: scaleX(-1) rotate(135deg);
            transform: scaleX(-1) rotate(135deg);
            -webkit-animation-fill-mode: forwards;
            -moz-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
        }

        #success_tic .checkmark-circle .checkmark:after {
            opacity: 1;
            height: 75px;
            width: 37.5px;
            -webkit-transform-origin: left top;
            -moz-transform-origin: left top;
            -ms-transform-origin: left top;
            -o-transform-origin: left top;
            transform-origin: left top;
            border-right: 15px solid #fff;
            border-top: 15px solid #fff;
            border-radius: 2.5px !important;
            content: '';
            left: 35px;
            top: 80px;
            position: absolute;
        }

        @-webkit-keyframes checkmark {
            0% {
                height: 0;
                width: 0;
                opacity: 1;
            }

            20% {
                height: 0;
                width: 37.5px;
                opacity: 1;
            }

            40% {
                height: 75px;
                width: 37.5px;
                opacity: 1;
            }

            100% {
                height: 75px;
                width: 37.5px;
                opacity: 1;
            }
        }

        @-moz-keyframes checkmark {
            0% {
                height: 0;
                width: 0;
                opacity: 1;
            }

            20% {
                height: 0;
                width: 37.5px;
                opacity: 1;
            }

            40% {
                height: 75px;
                width: 37.5px;
                opacity: 1;
            }

            100% {
                height: 75px;
                width: 37.5px;
                opacity: 1;
            }
        }

        @keyframes checkmark {
            0% {
                height: 0;
                width: 0;
                opacity: 1;
            }

            20% {
                height: 0;
                width: 37.5px;
                opacity: 1;
            }

            40% {
                height: 75px;
                width: 37.5px;
                opacity: 1;
            }

            100% {
                height: 75px;
                width: 37.5px;
                opacity: 1;
            }
        }
    </style>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                </div>
            </div>
            @if (Auth::user()->role == 'Admin')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="p-1 text-gray-900">

                                Total Active Users - {{ $users->count() }}
                            </div>
                        </div>
                        <div class="col-lg-2" >
                            <button type="button" class="btn bg-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Add More
                            </button>
                        
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center" id="exampleModalLabel">Registration Form
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3 row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control-plaintext" id="username"
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="useremail"
                                                        name="useremail">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPassword"
                                                    class="col-sm-2 col-form-label">Mobile</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="usermobile"
                                                        name="usermobile">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPassword"
                                                    class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="useraddress"
                                                        name="useraddress">
                                                </div>
                                            </div>



                                            <div class="mb-3 row" id="divpassword">
                                                <label for="inputPassword"
                                                    class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="userpassword"
                                                        name="password">
                                                </div>
                                            </div>


                                            <div class="mb-3 row" id="divcpassword">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Confirm
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control"
                                                        id="userpassword_confirmation" name="password_confirmation">
                                                </div>
                                            </div>




                                            <button type="button" class="btn bg-success mt-3 m-auto"
                                                data-toggle="modal" id="usersave"
                                                data-target="#success_tic">Save</button>

                                        </div>
                                        {{-- <div class="modal-footer"> --}}
                                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>





                    
                        </div>

                        {{-- sucess modalll --}}
                        
                            {{-- <div id="success_tic" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <a class="close" href="#" data-dismiss="modal">&times;</a>
                                        <div class="page-body">
                                            <div class="head">
                                                <h3 style="margin-top:5px;">Lorem ipsum dolor sit amet</h3>
                                                <h4>Lorem ipsum dolor sit amet</h4>
                                            </div>

                                            <h1 style="text-align:center;">
                                                <div class="checkmark-circle">
                                                    <div class="background"></div>
                                                    <div class="checkmark draw"></div>
                                                </div>
                                                <h1>

                                        </div>
                                    </div>
                                </div>

                            </div> --}}

                        






















                        {{-- <div class="col-lg-4 p-1">
                  <div class="input-group" style="border-radius: 3px solid">
                    <input class="form-control border-end-0 border rounded-pill" type="search" value="search" id="example-search-input">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary border rounded-pill ms-n5"  type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div> --}}
                    </div>
                </div>


        </div>
        <table class="table table-bordered data-table" id="users_table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            {{-- <tbody>
                  @php $i=1;@endphp
                  @foreach ($users as $data)
                  <tr>

                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->mobile }}</td>
                    <td>{{ $data->email }}</td>
                    <td> <button class="bg-danger">delete<button>&nbsp;&nbsp;<button class="bg-success">edit</button></td>
                  </tr>
                 
                @endforeach
                </tbody> --}}
            <tbody>
            </tbody>
        </table>
        @endif
    </div>

    </div>
    <script>
         let userName = document.getElementById('username');
            let userEmail = document.getElementById('useremail');
            let userMobile = document.getElementById('usermobile');
            let userAddress = document.getElementById('useraddress');
            let userPassword = document.getElementById('userpassword');
            let userConfirmPassword = document.getElementById('userpassword_confirmation');
            let saveButton = document.getElementById('usersave');
            let divpassword=document.getElementById('divpassword');
            let divConfirmpassword=document.getElementById('divcpassword');

        document.getElementById('usersave').addEventListener("click", function savebmi1() {
            divpassword.style.display="block";
            divConfirmpassword.style.display="block";

        

            $.ajax({
                type: "POST",
                url: "{{ url('adduser') }}",

                data: {
                    name: userName.value,
                    address: userAddress.value,
                    mobile: userMobile.value,
                    password: userPassword.value,
                    email: userEmail.value,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {
                    var oTable = $('#users_table').dataTable();
                    oTable.fnDraw(false);


                }

            });


        });


        function edit(value) {
            $.ajax({
                type: "POST",
                url: "{{ url('edituser') }}",
                data: {
                    id: value,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',

                success: function(res) {
                    console.log(res);
                    userName.value=res[0].name;
                    userEmail.value=res[0].email;
                     userMobile.value=res[0].mobile;
                     userAddress.value=res[0].address;
                     divpassword.style.display="none";
                     divConfirmpassword.style.display="none";
            
            
        
                    

                    // $('#CompanyModal').html("Edit Company");
                    // $('#company-modal').modal('show');
                    // $('#id').val(res.id);
                    // $('#name').val(res.name);
                    // $('#address').val(res.address);
                    // $('#email').val(res.email);
                }
            });

        };





        function deleteuser(value) {
            if (confirm("Delete Record?") == true) {
                var id = value;

                $.ajax({
                    type: "POST",
                    url: "{{ url('deleteuser') }}",
                    data: {
                        id: id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(res) {
                        var oTable = $('#users_table').dataTable();
                        oTable.fnDraw(false);
                    }
                });
            }
        };



        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('userlist') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'mobile',
                        name: 'mobile'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });



        });
    </script>
</x-app-layout>
