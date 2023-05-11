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
                <div class="announcements d-flex p-5 fs-4 mx-2">
                    <div class="w-50">

                    </div>

                    <div class="w-50 fs-4 mx-2">
                        <h6>YEAR 420, January 69</h6>
                        <p>"Join us for our annual Hackathon on October 30th! This year's theme is "Innovative Solutions
                            for a Better World". Whether you're a seasoned programmer or just starting out, this event
                            is open to all Tactics members and Ateneo de Naga University students who are passionate
                            about creating innovative solutions to real-world problems. Don't miss this chance to
                            network with like-minded individuals and showcase your skills. Register now on the Tactics
                            Connect website!"</p>
                            <br>
                        <h6>YEAR 420, January 69</h6>
                        <p>"Get ready for the annual <strong>ACP!</strong> A competitive programming competition to bolster your
                            programming and problem solving skills. Join us at the Marco blg, 420th floor. Get ready and
                            Enjoy the show!"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="saly">
        <img src="{{ asset('img/svg/Saly-10.svg') }}" class="position-absolute h-100" alt="">

    </div>
</div>

<style scoped>
    .saly {
        position: absolute;
        height: 100%;
        width: 100%;
    }

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
