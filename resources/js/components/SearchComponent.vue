<style scoped>
.mainContainer
{
    position: relative;  
    width: 1364px;
    height: 65px;
    background-color: #FFB101;
    margin: auto;
    margin-top: 15px;
    border-radius: 35px;
    border: 1px solid white;
    display: flex;
}

.mainContainer input
{
    height: 35px;
    align-self: center;
    border-radius: 30px;
    border: 1px solid #707070;
    outline-width: 0;
    padding: 10px;
}
.mainContainer input:first-child
{    
    flex: 7;
    margin: 0px 0px 0px 10px;    
}

.mainContainer input:nth-child(2)
{    
    flex: 1;
    margin: 0px 15px 0px 10px;
}

.mainContainer div
{
    height: 37px;
    width: 118px;
    border-radius: 20px;
    background-color: black;
    position: relative;
    align-self: center;
    vertical-align: middle;  
    text-align: center;  
    margin: 0px 15px 0px 0px;
    font-family: 'Sitka Banner', italic;
    font-size: 20px;
    border: 1px solid #707070; 
}

a
{
    text-decoration: none;
}

.searchA span
{    
    position: relative;
    top: 3px;
    color: white;
}
</style>

<template>
    <div class="mainContainer">
        <input type="text" placeholder="The Noodle Bar..">
        <input type="text" placeholder="Zipcode..">
        <div>
            <a class="searchA" href="tester"><span>Search</span></a>
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>