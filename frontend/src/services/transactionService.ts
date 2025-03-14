// src/services/transactionService.ts
import api from '../lib/axios'

export const fetchDashboard = async () => {
  try {
    const response = await api.get('v1/admin/dashboard') // Replace with your API endpoint
    return response.data
  } catch (error) {
    console.error('Error fetching dashboard data:', error)
    throw error
  }
}
