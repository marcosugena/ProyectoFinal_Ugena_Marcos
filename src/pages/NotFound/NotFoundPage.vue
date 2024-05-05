<template>
      <div className="found-container">
            <h1 id="title">4<span><img src=@/assets/ghost.svg alt="" id="ghost" /></span>4</h1>
            <div className="mt-5">
                <h2 id="title2">Error: 404 page not found</h2>
                <p id="context">Sorry, the page you're looking for cannot be accessed</p>
            </div>
            <a href="/">Comeback to the Landing</a>
        </div>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>
@import "../../Style/variables.scss";
$ghost: #528cce;
$heading: #e7ebf2;

.found-container {
  background-color: $blue;
  align-items: center;
  display: flex;
  flex-direction: column;
  height: 100vh;
  justify-content: center;
  text-align: center;
  a {
    color: $bluelight;
  }
}

#title {
  color: $bluelight;
  font-size: 12.5rem;
  letter-spacing: .10em;
  margin: .025em 0;
  text-shadow: .05em .05em 0 rgba(0,0,0,.25);
  white-space: nowrap;

  @media (max-width: 30rem) {
    font-size: 8.5rem;
  }

  & > span {
    animation: spooky 2s alternate infinite linear;
    color: $ghost;
    display: inline-block;
  }
}

#title2 {
  color: $heading;
  margin-bottom: .40em;
}

#context {
  color: #ccc;
  margin-top: 0;
}

#ghost {
  width: 100px;
  height: 100px;

  @media only screen and (min-width: 900px) {
    width: 250px;
    height: 250px;
  }
}

@keyframes spooky {
  from {
    transform: translateY(.15em) scaleY(.90);
  }

  to {
    transform: translateY(-.15em);
  }
}

</style>