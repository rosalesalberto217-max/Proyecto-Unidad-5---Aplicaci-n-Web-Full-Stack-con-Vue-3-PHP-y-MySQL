import { apiFetch } from '@/composables/useApi'

export async function obtenerContactos() {

    return await apiFetch(
        '/contactos/index.php'
    )
}