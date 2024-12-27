<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'ms_berita';
    protected $primaryKey = 'id_ms_berita';
    protected $allowedFields = ['judul', 'tgl_waktu', 'deskripsi', 'aktif', 'viewer', 'id_ms_kategori_berita'];

    public function getBeritaWithKategori($id)
    {
        return $this->join('ms_kategori_berita', 'ms_berita.id_ms_kategori_berita = ms_kategori_berita.id_ms_kategori_berita')
            ->where(['ms_berita.id_ms_berita' => $id])
            ->first();
    }
    public function incrementViewer($id)
    {
        $data = $this->find($id);
        $this->set('viewer', $data['viewer'] ? $data['viewer'] + 1 : 1, false)
            ->where('id_ms_berita', $id)
            ->update();
    }
    public function extractThumbnail($deskripsi)
    {

        // Sample text containing HTML
        $text = $deskripsi;

        // Optionally decode HTML entities if text is encoded
        $html = htmlspecialchars_decode($text);

        // Regex to match img tags and extract the src attribute
        preg_match('/<img[^>]+src="([^">]+)"/i', $html, $matches);

        // Extracted src URLs are in the second element of $matches

        $imgSrcs = $matches[1];



        // If an image is found, return its URL, otherwise return a placeholder
        return $matches ? $imgSrcs : 'path/to/default-thumbnail.jpg';
    }
    public function extractSnippet($deskripsi, $limit = 150)
    {
        // Strip HTML tags and limit content to the first 150 characters
        $cleanText = strip_tags($deskripsi);
        if (strlen($cleanText) > $limit) {
            return substr($cleanText, 0, $limit) . '...'; // Limit and append '...'
        }
        return $cleanText;
    }
    public function getDailyViewerData()
    {
        $query = $this->db->query("
            SELECT judul, SUM(viewer) as daily_viewers 
            FROM ms_berita 
            
        ");

        return $query->getResultArray();
    }
    public function getTop10MostViewed()
    {
        return $this->orderBy('viewer', 'DESC')->limit(10)->findAll();
    }
}
