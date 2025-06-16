@extends('frontend.layout')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div
      class="breadcumb-area bg-img bg-overlay"
      style="background-image: url({{ asset('frontend/img/bg-img/breadcumb4.jpg') }})"
    >
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <div class="breadcumb-text text-center">
              <h2>Contact Us</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Contact Form Area Start ##### -->
    <div class="contact-area section-padding-0-70">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-heading">
              <h3>Get In Touch</h3>
            </div>
          </div>
        </div>

        @if(session('success'))
          <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        @endif

        <div class="row">
          <div class="col-12 col-lg-4">
            <!-- Single Contact Information -->
            <div class="single-contact-information mb-30">
              <h6>Address:</h6>
              <p>Sekardangan Indah <br />Sidoarjo, Jawa Timur</p>
            </div>
            <!-- Single Contact Information -->
            <div class="single-contact-information mb-30">
              <h6>Phone:</h6>
              <p>+62 835 7953 3243 <br />+62 815 7557 8112</p>
            </div>
            <!-- Single Contact Information -->
            <div class="single-contact-information mb-30">
              <h6>Email:</h6>
              <p>cookoories@gmail.com</p>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="contact-form-area">
              <form action="{{ route('contact.store') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-12 col-lg-6">
                    <input
                      type="text"
                      class="form-control @error('name') is-invalid @enderror"
                      id="name"
                      name="name"
                      placeholder="Name"
                      value="{{ old('name') }}"
                      required
                    />
                    @error('name')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-12 col-lg-6">
                    <input
                      type="email"
                      class="form-control @error('email') is-invalid @enderror"
                      id="email"
                      name="email"
                      placeholder="E-mail"
                      value="{{ old('email') }}"
                      required
                    />
                    @error('email')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-12">
                    <input
                      type="text"
                      class="form-control @error('subject') is-invalid @enderror"
                      id="subject"
                      name="subject"
                      placeholder="Subject"
                      value="{{ old('subject') }}"
                      required
                    />
                    @error('subject')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-12">
                    <textarea
                      name="message"
                      class="form-control @error('message') is-invalid @enderror"
                      id="message"
                      cols="30"
                      rows="10"
                      placeholder="Message"
                      required
                    >{{ old('message') }}</textarea>
                    @error('message')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-12 text-center">
                    <button class="btn delicious-btn mt-30" type="submit">
                      Send
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ##### Contact Form Area End ##### -->
@endsection