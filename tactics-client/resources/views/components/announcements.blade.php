<div class="announcement-container d-flex align-items-center" id="announcement_section">
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    <div class="container-fluid blackboard">
        <div class="board">
            {{-- Blackboard Circles --}}
            <div class="circle top-left"></div>
            <div class="circle top-right"></div>
            <div class="circle bottom-left"></div>
            <div class="circle bottom-right"></div>
            <div class="announcement-font">
                <h1 class="announcement-header text-center mt-3">ANNOUNCEMENTS</h1>
            </div>
        </div>
    </div>
    {{-- <img src="{{ asset('img/svg/Saly-10.svg') }}" class="saly-svg" alt=""> --}}
</div>

<style scoped>
    .announcement-container {
        height: 100vh;
        width: 100%;
    }

    /* Default styles */
    .blackboard {
        background-color: #1c1c1c;
        width: 100%;
        max-width: 1676px;
        height: 871px;
        padding: 20px;
        box-sizing: border-box;
        position: relative;
        border-radius: 49px;
        margin: 0 auto;
        align-items: center;
    }

    .board {
        background-color: #072C3F;
        box-shadow: 8px 4px 11px 8px rgba(0, 0, 0, 0.25);
        border-radius: 49px;
        border: 15px solid #775045;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
    }

    /* Media queries */
    @media only screen and (max-width: 1600px) {

        /* Adjust the blackboard height */
        .blackboard {
            width: 1400px;
        }

        /* Adjust the board border size */
        .board {
            border: 10px solid #775045;
        }
    }

    @media only screen and (max-width: 480px) {

        /* Adjust the blackboard height */
        .blackboard {
            height: 300px;
        }

        /* Adjust the board border size */
        .board {
            border: 5px solid #775045;
        }
    }

    .circle {
        position: absolute;
        background-color: #fff;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        box-shadow: inset 3px 3px 15px 3px rgba(0, 0, 0, 0.25);
    }

    .top-left {
        top: 35px;
        left: 35px;
    }

    .top-right {
        top: 35px;
        right: 35px;
    }

    .bottom-left {
        bottom: 35px;
        left: 35px;
    }

    .bottom-right {
        bottom: 35px;
        right: 35px;
    }

    .announcement-font {
        font-family: 'Fredericka the Great', cursive;
        color: white;
    }

    .announcement-header {
        font-size: 70px;

        font-weight: 400;
    }
</style>
