@extends('layouts.customer.app')

@section('content')

<section class="signup-form-section pt20">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="mb50 text-center">Step 02: Add a Property</h1>
                <form id="add-property-form" class="signup-form site-form" action="{{route('customer.signup2')}}" method="POST">
                    <!-- <h3 class="fs18 white bcblack pt10 pb10 pl20 pr20 mb30">Added Successfully</h3> -->
                    <fieldset>
                        @csrf
                        <input type="hidden" placeholder="" name="more" id="more" value="0">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    <label for="">Property Name</label>
                                    <input type="text" placeholder="" name="name" id="name" required>
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <p>
                                    <label for="">Property Address</label>
                                    <input type="text" placeholder="" name="address" id="address" required>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-center">
                                    <a href="{{route('customer.signup3')}}" class="btn btn-cyan">Skip</a>
                                    <button type="button" class="btn btn-red" onclick="setValue(1)">Save & Add More</button>
                                    <button type="button" class="btn btn-red" onclick="setValue(0)">Save & Continue</button>
                                </p>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function setValue(value) {
        var hiddenInput = document.getElementById('more');
        hiddenInput.value = value;

        // Submit the form
        var form = document.getElementById('add-property-form');
        form.submit();
    }
</script>
@endsection
