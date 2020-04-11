@extends('layouts.public') @section('meta-tags')
<!-- Your Meta Tags Here-->
@endsection @section('navbar-hero-body')
<div class="container has-text-white">
  <div class="columns">
    <div class="column is-two-third">
      <p class="title">
        Concise money translation to words
      </p>
      <p class="subtitle">
        Easily support translation for money values in over 50 indigienious
        languages, and make users feel home.
      </p>
    </div>

    <div class="column"></div>
  </div>
</div>
@endsection @section('content')
<section class="mt-2 mb-8">
  <div class="columns">
    <div class="column is-8-desktop is-offset-2-desktop">
      <div class="ls-section-content has-text-centered mt-4 mb-3">
        <h3 class="title has-text-dark">Feature from Turforti</h3>
        <p class="content has-text-grey is-size-5">
          Build on our well thought APIs to improve the level of
          internationalisation you give your customers, and never have to worriy
          about where your users are connecting from. Simply because we got you
          covered.
        </p>
      </div>
    </div>
  </div>

  <div
    class="columns has-margin-20 has-margin-left-40-tablet has-margin-right-40-tablet"
  >
    @for ($i = 0; $i < 3; $i++)
    <div class="column is-one-third">
      <article class="card ls-feature-card">
        <div class="card-content">
          <figure class="image is-159x159">
            <img
              src="https://bulma.style/landspeed/dist/img/ui-icon@3x.png"
              srcset="
                https://bulma.style/landspeed/dist/img/ui-icon@2x.png  320w,
                https://bulma.style/landspeed/dist/img/ui-icon@3x.png  400w,
                https://bulma.style/landspeed/dist/img/ui-icon@3x.png 1024w
              "
              title="LandSpeed UI"
              width="145"
              height="159"
            />
          </figure>
          <div class="media-content has-text-centered">
            <h3 class="title is-5 has-text-weight-bold">
              <a href="/" class="has-text-dark" title="">Clean UI Design</a>
            </h3>
            <p class="is-size-6">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
          </div>
        </div>
      </article>
    </div>
    @endfor
  </div>
</section>

<section class="section has-background-primary ls-hero-image mt-5 pt-8 pb-8">
  <div class="container">
    <div class="columns">
      <div class="column is-4 has-text-white">
        <h4 class="title is-3 has-text-white">Feature &amp; Statistics</h4>
        <div class="content">
          <p>
            Pellentesque dictum purus leo, et placerat turpis porta gravida. In
            cursus diam id ipsum vulputate, ut venenatis eros porta. Aenean
            fringilla a nisi ac viverra.
          </p>
          <p>
            Curabitur sagittis sit amet quam at rhoncus. Ut sed consequat ex,
            sed consequat ipsum. Pellentesque nec nisi justo.
          </p>
        </div>
        <a class="button has-text-weight-bold ls-button is-success"
          >Download Theme</a
        >
      </div>
      <div class="column is-8">
        <figure class="image">
          <!-- <img
                src="https://bulma.style/landspeed/dist/img/hero-image@3x.png"
                srcset="
                  https://bulma.style/landspeed/dist/img/hero-image@2x.png  320w,
                  https://bulma.style/landspeed/dist/img/hero-image@3x.png  400w,
                  https://bulma.style/landspeed/dist/img/hero-image@3x.png 1024w
                "
                title="LandSpeed Example"
                width="861"
                height="564"
              /> -->
        </figure>
      </div>
    </div>
  </div>
</section>

@include('shared.pricing')

<section class="section ls-rainbow-gradient">
  <div class="container">
    <div class="columns">
      <div class="column is-8">
        <h3 class="title has-text-white is-3 has-text-bold">
          Found what you want?
        </h3>
        <p class="has-text-white">
          Proceed to signup, and make your users feel at home.
        </p>
      </div>
      <div class="column is-2 is-offset-1 ls-round-input mt-1">
        <div class="container">
          <button type="submit" class="button is-success">Get Started</button>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
