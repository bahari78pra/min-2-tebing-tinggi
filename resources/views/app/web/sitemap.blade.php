@php echo "<?xml version='1.0' encoding='UTF-8'?>
<urlset
      xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'
      xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance'
      xsi:schemaLocation='http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd'>
    <url>
        <loc>https://perguruanislamiyah.sch.id</loc>
        <lastmod>2021-06-18T06:52:37+00:00</lastmod>
        <priority>0.6</priority>
      </url>
      <url>
        <loc>https://perguruanislamiyah.sch.id/galeri-foto</loc>
        <lastmod>2021-06-18T06:52:37+00:00</lastmod>
        <priority>0.6</priority>
      </url>
      <url>
        <loc>https://perguruanislamiyah.sch.id/pendaftaran</loc>
        <lastmod>2021-06-18T06:52:37+00:00</lastmod>
        <priority>0.6</priority>
      </url>
      <url>
        <loc>https://perguruanislamiyah.sch.id/prestasi</loc>
        <lastmod>2021-06-18T06:52:37+00:00</lastmod>
        <priority>0.6</priority>
      </url>";
      @endphp

@foreach ($berita as $data_berita)
    <url>
        <loc>https://perguruanislamiyah.sch.id/berita/{{ $data_berita->alias }}</loc>
        <lastmod>{{ $data_berita->updated_at->format('Y-m-d') . 'T06:52:37+00:00' }}</lastmod>
        <priority>0.6</priority>
    </url>
@endforeach

@foreach ($profil as $data_profil)
    <url>
        <loc>https://perguruanislamiyah.sch.id/profil/{{ $data_profil->alias }}</loc>
        <lastmod>{{ $data_profil->updated_at->format('Y-m-d') . 'T06:52:37+00:00' }}</lastmod>
        <priority>0.6</priority>
    </url>
@endforeach

@foreach ($lembaga as $data_lembaga)
    <url>
        <loc>https://perguruanislamiyah.sch.id/lembaga/{{ $data_lembaga->alias }}</loc>
        <lastmod>{{ $data_lembaga->updated_at->format('Y-m-d') . 'T06:52:37+00:00' }}</lastmod>
        <priority>0.6</priority>
    </url>
@endforeach

@foreach ($fasilitas as $data_fasilitas)
    <url>
        <loc>https://perguruanislamiyah.sch.id/fasilitas/{{ $data_fasilitas->alias }}</loc>
        <lastmod>{{ $data_fasilitas->updated_at->format('Y-m-d') . 'T06:52:37+00:00' }}</lastmod>
        <priority>0.6</priority>
    </url>
@endforeach

@foreach ($ekstrakurikuler as $data_ekstrakurikuler)
    <url>
        <loc>https://perguruanislamiyah.sch.id/ekstrakurikuler/{{ $data_ekstrakurikuler->alias }}</loc>
        <lastmod>{{ $data_ekstrakurikuler->updated_at->format('Y-m-d') . 'T06:52:37+00:00' }}</lastmod>
        <priority>0.6</priority>
    </url>
@endforeach
</urlset>
