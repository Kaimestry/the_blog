<style>
    #aside-bar{
        position: fixed;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        height: 90vh;
    }
    #aside-bar nav{
        display: inline-flex;
        flex-direction: column;
        justify-content: space-between;
        height: 50vh;
        padding-left: 30px;
    }
    #aside-bar a{
        background-color: var(--lavender);
        color: var(--purple);
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        border-radius: 10px;
        text-decoration: none;
    }
</style>

<aside id="aside-bar">
    <nav>
        <a href="#" class="icon-btn"><i class="fa-solid fa-plus"></i></a>
        <a href="#" class="icon-btn"><i class="fa-solid fa-bookmark"></i></a>
        <a href="#" class="icon-btn"><i class="fa-solid fa-magnifying-glass"></i></i></a>
    </nav>
</aside>