import * as React from 'react'
import { HeaderContext } from '@/contexts/HeaderContext'

export default function useHeader() {
  return React.useContext(HeaderContext)
}
