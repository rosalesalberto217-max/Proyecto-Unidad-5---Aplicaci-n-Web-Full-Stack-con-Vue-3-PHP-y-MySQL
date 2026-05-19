export async function getApiUrl() {

    const response = await fetch('/config.json')

    const config = await response.json()

    return config.API_URL
}