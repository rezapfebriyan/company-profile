<?php include_once 'header.php'; ?>

        <!-- untuk home -->
        <section id="home">
            <img src="<?= getImage('5')?>" alt="">
            <div class="kolom">
                <p class="deskripsi"><?= getQuote('5') ?></p>
                <h2><?= getTitle('5') ?></h2>
                <p><?= wordMax(getContent('5'), 35) ?></p>
                <p><a href="<?= createPageUrl('5')?>" class="tbl-pink">Pelajari Lebih Lanjut</a></p>
            </div>
        </section>

        <!-- untuk courses -->
        <section id="courses">
            <div class="kolom">
                <p class="deskripsi"><?= getQuote('11') ?></p>
                <h2><?= getTitle('11') ?></h2>
                <p><?= wordMax(getContent('11'), 35) ?></p>
                <p><a href="<?= createPageUrl('11')?>" class="tbl-biru">Pelajari Lebih Lanjut</a></p>
            </div>
            <img src="<?= getImage('11') ?>" alt="">
        </section>

        <!-- untuk tutors -->
        <section id="tutors">
            <div class="tengah">
                <div class="kolom">
                    <p class="deskripsi">Our Top Tutors</p>
                    <h2>Tutors</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, optio!</p>
                </div>

                <div class="tutor-list">
                    <?php
                        $sql = "SELECT * FROM tutors ORDER BY id DESC";
                        $query = mysqli_query($konek, $sql);
                        while ($result = mysqli_fetch_array($query)) {
                    ?>
                        <div class="kartu-tutor">
                            <a href="<?= createPageTutors($result['id']) ?>">
                            <img src="<?= urlDasar()."/img/".tutorsPict($result['id']) ?>"/>
                            <p><?= $result['nama'] ?></p>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <!-- untuk partners -->
        <section id="partners">
            <div class="tengah">
                <div class="kolom">
                    <p class="deskripsi">Our Top Partners</p>
                    <h2>Partners</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi magni tempore expedita sequi. Similique rerum doloremque impedit saepe atque maxime.</p>
                </div>

                <div class="partner-list">
                <?php
                    $sql = "SELECT * FROM partners ORDER BY id ASC";
                    $query = mysqli_query($konek, $sql);
                    while ($result = mysqli_fetch_array($query)) {
                ?>
                    <div class="kartu-partner">
                        <a href="<?= createPagePartners($result['id']) ?>">
                        <img src="<?= urlDasar()."/img/".partnersPict($result['id']) ?>"/>
                        </a>
                    </div>
                <?php } ?>

                </div>
            </div>
        </section>

<?php include_once 'footer.php'; ?>