
<div class="outer__circle"> 
    <div class="inner__circle__one"> 
        <div class="inner__circle__two"> 
            <div class="inner__circle__three">
                loading...
            </div> 
        </div> 
    </div> 
</div>


<script class="stylesheet">
    body
    { 
        height:100vh; display:grid; place-items:center; background-color:rgb(0,0,0,1); 
    } 
    .outer__circle, .inner__circle__one, .inner__circle__two, .inner__circle__three
    { 
        display:grid; place-items:center; border-radius:50%; 
    }
     @mixin circle($width:100%,$height:100%,$borderDirection:border,$borderColor:black,$animationTime:1s)
     { 
        width:$width; height:$height; #{$borderDirection}:3px solid $borderColor; animation:rotation 
     }

$animationTime linear infinite forwards; 
// Animation mixin @mixin animation($animationName){ @keyframes #{$animationName}{ @content } } .outer__circle{ @include circle(80px,80px,border-top,crimson,2s); } 
.inner__circle__one
{ 
    @include circle(70px,70px,border-bottom,lime,2s); 
} 
.inner__circle__two
{ 
    @include circle(60px,60px,border-right,cyan,2s); 
} 
.inner__circle__three
{ 
    @include circle(50px,50px,border-left,violet,2s); 
} 
@include animation(rotation)
    { 
        from
        { 
            transform:rotate(0deg) 
        } 
        to
        { 
            transform:rotate(360deg) 
        } 
    }
</script>


