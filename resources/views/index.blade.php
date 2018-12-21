@extends('layouts.app')

@section('content')
    {{-- Affiche les erreurs --}}
    @if ($errors->any())
        <div class="alert alert-danger"  style="margin-top: 2rem">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
indenter         </div>
    @endif

<section class="banner">
    <div class="title">Facstory</div>
    <div class="subtitle">
        L'usine à histoires !
    </div>
</section>







  <section class="history">

<div class="icon">
    <i class="fas fa-book"></i>

</div>


<div class="section-title">
    Les histoires
</div>

<div class="mosaic">
        @foreach($histoires as $histoire)

            <a class="column" href="{{route("accueil_histoire",['id'=>$histoire->id])}}">
                <img class="imageHistoire" src="{{$histoire ->photo}}" />


            </a>
    @endforeach

  </div>


</section>


    <section class="contact">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
      <div class="login-form">

          <div class="icon">
              <i class="fas fa-file-signature" id="sign"></i></i>

          </div>
          <div class="section-title"> Nous contacter</div>


          <div class="grid2">


          <form>
              <ul class="form-style-1">
                  </span></label><input type="text" name="field1" class="field-divided" placeholder="Nom" /> <input type="text" name="field2" class="field-divided" placeholder="Prénom" /></li>
                  <li>

                      <input type="email" name="field3" class="field-long" placeholder="email" />
                  </li>

                  <li>

                      <textarea  name="field5" id="field5" class="field-long field-textarea" placeholder="Ecrivez votre message" ></textarea>
                  </li>
                  <li>
                      <input type="submit" value="Submit" />
                  </li>
              </ul>
          </form>

              <div class="img-grotte">
                  <img src="<../../img/grotte3.png">
              </div>



          </div>




      </div>
  </section>

@endsection

