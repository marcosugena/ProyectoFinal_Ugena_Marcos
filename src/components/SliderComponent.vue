<template>
  <div>
    <div
      id="PowerLabSlider"
      class="carousel slide slidePower"
      data-bs-ride="carousel"
    >
      <div class="carousel-indicators">
        <button
          type="button"
          data-bs-target="#PowerLabSlider"
          data-bs-slide-to="0"
          class="active"
          aria-current="true"
          aria-label="Slide 1"
        ></button>
        <button
          type="button"
          data-bs-target="#PowerLabSlider"
          data-bs-slide-to="1"
          aria-label="Slide 2"
        ></button>
        <button
          type="button"
          data-bs-target="#PowerLabSlider"
          data-bs-slide-to="2"
          aria-label="Slide 3"
        ></button>
        <button
          type="button"
          data-bs-target="#PowerLabSlider"
          data-bs-slide-to="3"
          aria-label="Slide 4"
        ></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="@/assets/slide4.jpg" class="d-block w-100" alt="..." />
          <div class="carousel-caption d-md-block">
            <h4 class="mb-1">
              Descubre el sabor extraordinario de la vida con nuestra selección
              premium de alimentos
            </h4>
            <p>Sabor, excelencia, experiencia.</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="10000">
          <img src="@/assets/slide2.jpg" class="d-block w-100" alt="..." />
          <div class="carousel-caption d-md-block">
            <h4 class="mb-1">
              Eleva tu nutrición con nuestra selección premium de alimentos
            </h4>
            <p>Nutrición de élite.</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="10000">
          <img src="@/assets/slide3.jpg" class="d-block w-100" alt="..." />
          <div class="carousel-caption d-md-block">
            <h4>
              Optimiza tu rendimiento con nuestra suplementación deportiva de
              excelencia
            </h4>
            <p>Alcanza tu máximo</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="10000">
          <img src="@/assets/slide1.jpg" class="d-block w-100" alt="..." />
          <div class="carousel-caption d-md-block">
            <h4>BCAAs potencia tu rendimiento, acelera la recuperación.</h4>
            <p>Potencia tu rendimiento y acelera la recuperación</p>
          </div>
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#PowerLabSlider"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#PowerLabSlider"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</template>
<script>
export default {};
</script>
<style lang="scss" scoped>
@import "../Style/variables.scss";

.slidePower {
  z-index: 0;

  .carousel-inner {
    .carousel-item {
      transition: transform 1s ease;
    }
  }

  .carousel-caption {
    h4 {
      font-size: 15px;
    }

    p {
      font-size: 12px;
    }
  }

  img {
    width: 30%;
    height: 55vw;
    filter: brightness(60%) contrast(90%) saturate(80%);
  }
}

@media only screen and (min-width: 850px) {
  .slidePower {
    z-index: 0;

    img {
      height: 40vw;
      width: 100%;
      filter: brightness(60%) contrast(90%) saturate(80%);
    }

    .carousel-caption {
      h4 {
        font-size: 20px;
      }

      p {
        font-size: 14px;
      }
    }
  }

  h4 {
    font-size: 60px;
    font-weight: 500;
  }
}
</style>
