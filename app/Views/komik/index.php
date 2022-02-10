<?= $this->extend('/layout/template'); ?>


<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <a href="/comics/create" class="btn btn-primary mt-4">Tambah Data Komik</a>
            <h1 class="mt-2">Daftar Komik</h1>
            <?php if (session()->getFlashdata('Pesan')) :; ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('Pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="mt-2 table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($comic as $c) :;
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $c['sampul']; ?>" class="sampul" alt=""></td>
                            <td><?= $c['judul']; ?></td>
                            <td>
                                <a href="/comics/<?= $c['slug']; ?>" class="btn btn-success">Detail</a>
                                <a href="#" class="btn btn-warning">edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection('contenat'); ?>