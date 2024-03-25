import Quill from 'quill';
import 'quill/dist/quill.core.css';
import 'quill/dist/quill.snow.css';
import 'quill/dist/quill.bubble.css';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import FlexAdminBulkUploader from './bulk_upload.js';
import { quillSnowModules } from './quill_editor.js';

window.Swal = Swal;
window.FlexAdminBulkUploader = new FlexAdminBulkUploader();
window.Quill = Quill;
window.quillSnowModules = quillSnowModules;

window.colors = {
  red: '#fd397a',
  blue: '#0d6efd',
  green: '#28a745',
  yellow: '#ffc107',
  gray: '#e3eaef',
  purple: '#9833d5'
}