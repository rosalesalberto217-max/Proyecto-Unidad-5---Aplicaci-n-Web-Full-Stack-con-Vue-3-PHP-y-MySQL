import { getApiUrl } from '@/config/api'

import { useAuthStore } from '@/stores/auth'

export async function apiFetch(endpoint, options = {}) {

    const API_URL = await getApiUrl()

    const authStore = useAuthStore()

    const headers = {
        ...options.headers
    }

    if (authStore.token) {

        headers.Authorization =
            `Bearer ${authStore.token}`
    }

    const response = await fetch(
        `${API_URL}${endpoint}`,
        {
            ...options,
            headers
        }
    )

    return response.json()
}