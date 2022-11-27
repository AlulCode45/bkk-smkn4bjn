document.addEventListener("DOMContentLoaded", async() => {
            const response = await fetch(
                "https://bkk-smkn4bojonegoro.sch.id/api/rekapitulasi"
            );
            const result = await response.json();
            counterAnim("#kompetensi", 10, result.count, 1000);
            counterAnim("#lowongan", 10, result.lowongan, result.lowongan * 1);
            counterAnim("#perusahaan1", 10, result.total_perusahaan, result.total_perusahaan * 1);
            counterAnim("#perusahaan2", 10, result.mou_perusahaan, 100);
            counterAnim("#pesertadidik", 10, result.peserta_didik, result.peserta_didik * 1);
            counterAnim("#perusahaan3", 10, result.umkm_perusahaan, 100);
            counterAnim("#perusahaan4", 10, result.both_perusahaan, 100);
        counterAnim("#totalrombal", 10, 39, 1500);
        counterAnim("#totalalumni", 10, 0, 1000);
        counterAnim("#alumnibekerja", 10, 0, 1500);
        counterAnim("#alumnikuliah", 10, 0, 2000);
        counterAnim("#alumniwirausaha", 10, 0, 2500);
});