<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        @media print {
/* Define the header and footer */
            @page {
                margin-top: 1cm;
                margin-bottom: 3cm;
                @bottom-right{
                    content: "AL-KAFI LABORATORY";
                }
                @bottom-left{
                    content:'Page ' counter(page) ' of ' counter(pages);
                }
            }
        }


    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container p-3 mt-5">
        <header>
            <div class="header-conataier d-flex align-items-center justify-content-between">
                <div>
                    <div class="fs-2 text-uppercase mb-2"> <i class="fa fa-blood"></i>AL-KAFI LABORATORY  <br/><span class="fs-4 text-danger"> for medical analysis</span> </div>
                    <div><i class="fa fa-map text-danger me-2"></i>Syria</div>
                    <div><i class="fa fa-phone text-danger me-2"></i>0997845678</div>
                </div>
                <img src="{{asset('lab.png')}}" class="w-25 rounded" alt="">
            </div>
        </header>
        <main>
            <hr class="mt-5 mb-4">
            <div class="content">
                @yield('content')
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @vite('resources/js/print.js')
    <script>
        window.addEventListener('load',()=>{
            setTimeout(() => {
                print()
            }, 3000);
        })
        window.onafterprint  =()=>{
            window.history.go(-1);
        }
    </script>

</body>
</html>
