import * as React from 'react'
import { SchoolsContext } from '@/contexts/SchoolsContext'

interface SchoolsProviderProps {
  children: React.ReactNode
}

const initialValue: ISchool[] = [...Array(8)].map((_, index) => ({
  id: ++index,
  name: 'Escola ' + index,
  cnpj: '00.000 000 0000-00',
  address: 'Rua 123, 123',
  email: 'escola' + index + '@example.com',
  phone: '1234-5678',
  createdAt: new Date(),
  updatedAt: new Date(),
  accountId: 1,
}))

export default function SchoolsProvider({ children }: SchoolsProviderProps) {
  const [schools, setSchools] = React.useState<ISchool[]>(initialValue)
  const [currentSchool, setCurrentSchool] = React.useState<ISchool | null>(null)
  const [openCreateDialog, setOpenCreateDialog] = React.useState<boolean>(false)
  const [openUpdateDialog, setOpenUpdateDialog] = React.useState<boolean>(false)

  const handleToggleCreateDialog = () => {
    setOpenCreateDialog(!openCreateDialog)
  }

  const handleToggleUpdateDialog = () => {
    setOpenUpdateDialog(!openUpdateDialog)
  }

  const handleCreateSchool = (school: ICreateSchoolData) => {
    const newSchool: ISchool = {
      id: schools.length + 1,
      createdAt: new Date(),
      updatedAt: new Date(),
      accountId: 1,
      ...school,
    }

    setSchools([...schools, newSchool])
  }

  const handleUpdateSchool = (id: number, updatedData: IUpdateSchoolData) => {
    setSchools((prevSchools) =>
      prevSchools.map((school) =>
        school.id === id
          ? { ...school, ...updatedData, updatedAt: new Date() }
          : school
      )
    )
  }

  const handleDeleteSchool = (id: number) => {
    setSchools((prevSchools) =>
      prevSchools.filter((school) => school.id !== id)
    )
  }

  const handleFindSchool = (id: number) => {
    const school = schools.find((school) => school.id === id) || null
    if (school == null) throw new Error('School not found.')
    return school
  }

  return (
    <SchoolsContext.Provider
      value={{
        schools,
        currentSchool,
        setCurrentSchool,
        openCreateDialog,
        openUpdateDialog,
        handleToggleCreateDialog,
        handleToggleUpdateDialog,
        handleCreateSchool,
        handleUpdateSchool,
        handleDeleteSchool,
        handleFindSchool,
      }}
    >
      {children}
    </SchoolsContext.Provider>
  )
}
